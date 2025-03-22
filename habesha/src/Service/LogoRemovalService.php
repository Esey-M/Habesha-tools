<?php

namespace App\Service;

use App\Entity\ImageProcess;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class LogoRemovalService
{
    private string $uploadDir;
    private string $pythonScript;
    private string $pythonPath;

    public function __construct(ParameterBagInterface $params)
    {
        $this->uploadDir = $params->get('app.upload_directory');
        $this->pythonScript = $params->get('app.python_script_path_logo');
        $this->pythonPath = $params->get('app.python_path');
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
                throw new \RuntimeException('Input image file not found');
            }

            // Check if the image is readable
            if (!is_readable($imagePath)) {
                throw new \RuntimeException('Input image file is not readable');
            }

            // Check if the upload directory is writable
            if (!is_writable($this->uploadDir)) {
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
                    error_log('ERR > '.$buffer);
                } else {
                    error_log('OUT > '.$buffer);
                }
            });

            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            // Check if the output file was created
            if (!file_exists($resultPath)) {
                throw new \RuntimeException('Output file was not created');
            }

            return $resultFileName;
        } catch (\Exception $e) {
            error_log("Exception in removeLogo: " . $e->getMessage());
            error_log("Exception trace: " . $e->getTraceAsString());
            throw new \RuntimeException('Error processing image: ' . $e->getMessage());
        }
    }
} 