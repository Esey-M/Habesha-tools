<?php

namespace App\Service;

use App\Entity\ImageProcess;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Psr\Log\LoggerInterface;

class LogoRemovalService
{
    private string $uploadDir;
    private string $pythonScript;
    private string $pythonPath;
    private LoggerInterface $logger;

    public function __construct(
        ParameterBagInterface $params,
        LoggerInterface $logger
    ) {
        $this->uploadDir = $params->get('upload_directory');
        $this->pythonScript = $params->get('python_script_path_logo');
        $this->pythonPath = $params->get('python_path');
        $this->logger = $logger;
    }

    public function removeLogo(ImageProcess $imageProcess, array $coordinates): string
    {
        if (!$imageProcess->getImageName()) {
            throw new \RuntimeException('No image name provided');
        }

        $imagePath = $this->uploadDir . '/' . $imageProcess->getImageName();
        $resultFileName = 'logo_removed_' . uniqid() . '.png';
        $resultPath = $this->uploadDir . '/' . $resultFileName;

        try {
            // Check if the image file exists
            if (!file_exists($imagePath)) {
                $this->logger->error('Input image file not found', ['path' => $imagePath]);
                throw new \RuntimeException('Input image file not found');
            }

            // Check if the image is readable
            if (!is_readable($imagePath)) {
                $this->logger->error('Input image file is not readable', ['path' => $imagePath]);
                throw new \RuntimeException('Input image file is not readable');
            }

            // Check if the upload directory is writable
            if (!is_writable($this->uploadDir)) {
                $this->logger->error('Upload directory is not writable', ['directory' => $this->uploadDir]);
                throw new \RuntimeException('Upload directory is not writable');
            }

            // Convert coordinates to JSON string
            $coordinatesJson = json_encode($coordinates);

            // Run the Python script using the virtual environment's Python
            $process = new Process([
                $this->pythonPath,
                $this->pythonScript,
                $imagePath,
                $resultPath,
                $coordinatesJson
            ]);

            $process->setTimeout(60); // Increase timeout to 60 seconds
            $process->run(function ($type, $buffer) {
                if (Process::ERR === $type) {
                    $this->logger->error('Python script error output', ['output' => $buffer]);
                } else {
                    $this->logger->info('Python script output', ['output' => $buffer]);
                }
            });

            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            // Check if the output file was created
            if (!file_exists($resultPath)) {
                $this->logger->error('Output file was not created', ['path' => $resultPath]);
                throw new \RuntimeException('Output file was not created');
            }

            $this->logger->info('Logo removal completed successfully', [
                'input' => $imagePath,
                'output' => $resultPath
            ]);

            return $resultFileName;
        } catch (\Exception $e) {
            $this->logger->error('Exception in removeLogo', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw new \RuntimeException('Error processing image: ' . $e->getMessage());
        }
    }
} 