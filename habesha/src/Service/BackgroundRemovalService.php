<?php

namespace App\Service;

use App\Entity\ImageProcess;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class BackgroundRemovalService
{
    private string $uploadDir;
    private string $pythonScript;
    private string $pythonPath;

    public function __construct(ParameterBagInterface $params)
    {
        $this->uploadDir = $params->get('app.upload_directory');
        $this->pythonScript = $params->get('app.python_script_path');
        $this->pythonPath = $params->get('app.python_path');
    }

    public function removeBackground(ImageProcess $imageProcess): string
    {
        if (!$imageProcess->getImageName()) {
            throw new \RuntimeException('No image name provided');
        }

        $imagePath = $this->uploadDir . '/' . $imageProcess->getImageName();
        $resultFileName = 'bg_removed_' . uniqid() . '.png';
        $resultPath = $this->uploadDir . '/' . $resultFileName;

        try {
            // Check if the image file exists
            if (!file_exists($imagePath)) {
                error_log("Input image does not exist: " . $imagePath);
                throw new \RuntimeException('Input image file not found');
            }

            // Check if the image is readable
            if (!is_readable($imagePath)) {
                error_log("Input image is not readable: " . $imagePath);
                throw new \RuntimeException('Input image file is not readable');
            }

            // Check if the upload directory is writable
            if (!is_writable($this->uploadDir)) {
                error_log("Upload directory is not writable: " . $this->uploadDir);
                throw new \RuntimeException('Upload directory is not writable');
            }

            // Debug information
            error_log("Python Path: " . $this->pythonPath);
            error_log("Python Script: " . $this->pythonScript);
            error_log("Image Path: " . $imagePath);
            error_log("Result Path: " . $resultPath);
            error_log("Image file size: " . filesize($imagePath) . " bytes");

            // Run the Python script using the virtual environment's Python
            $process = new Process([
                $this->pythonPath,
                $this->pythonScript,
                $imagePath,
                $resultPath
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
                error_log("Process failed with output: " . $process->getOutput());
                error_log("Process failed with error output: " . $process->getErrorOutput());
                error_log("Process exit code: " . $process->getExitCode());
                throw new ProcessFailedException($process);
            }

            // Check if the output file was created
            if (!file_exists($resultPath)) {
                error_log("Output file was not created: " . $resultPath);
                throw new \RuntimeException('Output file was not created');
            }

            return $resultFileName;
        } catch (\Exception $e) {
            error_log("Exception in removeBackground: " . $e->getMessage());
            error_log("Exception trace: " . $e->getTraceAsString());
            throw new \RuntimeException('Error processing image: ' . $e->getMessage());
        }
    }
} 