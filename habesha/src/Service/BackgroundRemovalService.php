<?php

namespace App\Service;

use App\Entity\ImageProcess;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\ItemInterface;
use Doctrine\ORM\EntityManagerInterface;

class BackgroundRemovalService
{
    private $uploadDirectory;
    private $pythonScriptPath;
    private $pythonPath;
    private $logger;
    private $cache;
    private $entityManager;
    private $maxParallelProcesses = 3;
    private $runningProcesses = [];

    public function __construct(
        ParameterBagInterface $params,
        LoggerInterface $logger,
        EntityManagerInterface $entityManager
    ) {
        $this->uploadDirectory = $params->get('upload_directory');
        $this->pythonScriptPath = $params->get('python_script_path');
        $this->pythonPath = $params->get('python_path');
        $this->logger = $logger;
        $this->entityManager = $entityManager;
        $this->cache = new FilesystemAdapter('background_removal', 0, $params->get('kernel.cache_dir'));
    }

    public function removeBackground(ImageProcess $imageProcess): string
    {
        if (!$imageProcess->getImageName()) {
            throw new \RuntimeException('No image was uploaded. Please try again.');
        }

        $imagePath = $this->uploadDirectory . '/' . $imageProcess->getImageName();
        $resultFileName = 'bg_removed_' . $imageProcess->getImageName();
        $resultPath = $this->uploadDirectory . '/' . $resultFileName;

        try {
            // Check if the image file exists
            if (!file_exists($imagePath)) {
                throw new \RuntimeException('The uploaded image could not be found. Please try uploading again.');
            }

            // Check if the image is readable
            if (!is_readable($imagePath)) {
                throw new \RuntimeException('Unable to process the image. Please try uploading a different image.');
            }

            // Check if the upload directory is writable
            if (!is_writable($this->uploadDirectory)) {
                $this->logger->error('Upload directory is not writable', ['directory' => $this->uploadDirectory]);
                throw new \RuntimeException('We encountered a technical issue. Please try again later.');
            }

            // Check if Python script exists
            if (!file_exists($this->pythonScriptPath)) {
                $this->logger->error('Python script not found', ['script' => $this->pythonScriptPath]);
                throw new \RuntimeException('We encountered a technical issue. Please try again later.');
            }

            // Check cache first
            $cacheKey = 'bg_removal_' . md5_file($imagePath);
            return $this->cache->get($cacheKey, function (ItemInterface $item) use ($imagePath, $resultPath, $resultFileName, $imageProcess) {
                $item->expiresAfter(86400); // Cache for 24 hours

                $this->waitForAvailableSlot();
                $process = $this->createRemovalProcess($imagePath, $resultPath);
                $this->runningProcesses[] = $process;
                
                try {
                    $process->mustRun();
                    $this->logger->info('Background removal completed successfully', [
                        'input' => $imagePath,
                        'output' => $resultPath
                    ]);
                    
                    // Update the entity with the result image name
                    $imageProcess->setResultImageName($resultFileName);
                    $this->entityManager->persist($imageProcess);
                    $this->entityManager->flush();
                    
                    return $resultFileName;
                } catch (\Exception $e) {
                    $this->logger->error('Background removal failed', [
                        'error' => $e->getMessage(),
                        'input' => $imagePath
                    ]);
                    throw $e;
                } finally {
                    $this->removeProcess($process);
                }
            });
        } catch (ProcessFailedException $e) {
            $this->logger->error('Process failed', [
                'error' => $e->getMessage(),
                'input' => $imagePath
            ]);
            throw new \RuntimeException('We encountered an error while processing your image. Please try again.');
        } catch (\Exception $e) {
            $this->logger->error('Background removal failed', [
                'error' => $e->getMessage(),
                'input' => $imagePath
            ]);
            throw new \RuntimeException('An unexpected error occurred. Please try again later.');
        }
    }

    private function createRemovalProcess(string $inputPath, string $outputPath): Process
    {
        return new Process([
            $this->pythonPath,
            $this->pythonScriptPath,
            $inputPath,
            $outputPath
        ]);
    }

    private function waitForAvailableSlot(): void
    {
        while (count($this->runningProcesses) >= $this->maxParallelProcesses) {
            foreach ($this->runningProcesses as $key => $process) {
                if (!$process->isRunning()) {
                    unset($this->runningProcesses[$key]);
                }
            }
            if (count($this->runningProcesses) >= $this->maxParallelProcesses) {
                usleep(100000); // Wait 100ms before checking again
            }
        }
    }

    private function removeProcess(Process $process): void
    {
        $key = array_search($process, $this->runningProcesses);
        if ($key !== false) {
            unset($this->runningProcesses[$key]);
        }
    }
} 