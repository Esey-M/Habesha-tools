<?php

namespace App\Service;

use App\Entity\ImageProcess;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpKernel\KernelInterface;

class BackgroundRemovalService
{
    private string $privateUploadDir;
    private string $publicUploadDir;

    public function __construct(
        private KernelInterface $kernel
    ) {
        $this->privateUploadDir = dirname($this->kernel->getProjectDir(), 1) . '/private/uploads/background-remover';
        $this->publicUploadDir = dirname($this->kernel->getProjectDir(), 1) . '/public/uploads/background-remover';
    }

    public function removeBackground(ImageProcess $imageProcess): string
    {
        try {
            // Get the input file path
            $inputPath = $this->privateUploadDir . '/' . $imageProcess->getImageName();
            
            if (!file_exists($inputPath)) {
                throw new \RuntimeException('Input file not found');
            }

            // Generate output filename
            $outputFileName = 'processed_' . $imageProcess->getImageName();
            $outputPath = $this->publicUploadDir . '/' . $outputFileName;

            // For now, we'll just copy the file as a placeholder
            // In a real implementation, you would use a background removal API or library here
            copy($inputPath, $outputPath);

            return $outputFileName;
        } catch (\Exception $e) {
            error_log("Error in BackgroundRemovalService: " . $e->getMessage());
            throw new \RuntimeException('Failed to process image: ' . $e->getMessage());
        }
    }
} 