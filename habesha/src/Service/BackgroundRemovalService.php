<?php

namespace App\Service;

use App\Entity\ImageProcess;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class BackgroundRemovalService
{
    private string $privateUploadDir;
    private string $publicUploadDir;
    private string $pythonPath;
    private string $scriptPath;
    private Filesystem $filesystem;

    public function __construct(
        private KernelInterface $kernel
    ) {
        $this->privateUploadDir = $kernel->getProjectDir() . '/private/uploads/background-remover';
        $this->publicUploadDir = $kernel->getProjectDir() . '/public/uploads/background-remover';
        $this->pythonPath = $kernel->getProjectDir() . '/venv/bin/python3';
        $this->scriptPath = $kernel->getProjectDir() . '/scripts/remove_background.py';
        $this->filesystem = new Filesystem();
        
        error_log("BackgroundRemovalService initialized");
        error_log("Private upload dir: " . $this->privateUploadDir);
        error_log("Public upload dir: " . $this->publicUploadDir);
        error_log("Python path: " . $this->pythonPath);
        error_log("Script path: " . $this->scriptPath);
    }

    public function removeBackground(ImageProcess $imageProcess): string
    {
        try {
            error_log("Starting background removal for image: " . $imageProcess->getImageName());
            
            // Get the input file path
            $inputPath = $this->privateUploadDir . '/' . $imageProcess->getImageName();
            error_log("Input path: " . $inputPath);
            
            if (!file_exists($inputPath)) {
                error_log("ERROR: Input file not found: " . $inputPath);
                throw new \RuntimeException('Input file not found');
            }
            error_log("Input file exists. Size: " . filesize($inputPath));

            // Generate output filename
            $outputFileName = 'processed_' . pathinfo($imageProcess->getImageName(), PATHINFO_FILENAME) . '.png';
            $outputPath = $this->publicUploadDir . '/' . $outputFileName;
            error_log("Output path: " . $outputPath);

            // Ensure the output directory exists
            if (!file_exists($this->publicUploadDir)) {
                error_log("Creating public upload directory");
                $this->filesystem->mkdir($this->publicUploadDir, 0777);
            }

            // Create scripts directory if it doesn't exist
            if (!file_exists(dirname($this->scriptPath))) {
                error_log("Creating scripts directory");
                $this->filesystem->mkdir(dirname($this->scriptPath), 0777);
            }

            // Create the Python script if it doesn't exist
            if (!file_exists($this->scriptPath)) {
                error_log("Creating Python script");
                $this->createPythonScript();
            }

            // Run the Python script
            error_log("Running Python script");
            $process = new Process([
                $this->pythonPath,
                $this->scriptPath,
                $inputPath,
                $outputPath
            ]);
            $process->setTimeout(60);
            
            error_log("Executing command: " . $process->getCommandLine());
            $process->run(function ($type, $buffer) {
                if (Process::ERR === $type) {
                    error_log('ERR > '.$buffer);
                } else {
                    error_log('OUT > '.$buffer);
                }
            });

            if (!$process->isSuccessful()) {
                error_log("Process failed: " . $process->getErrorOutput());
                throw new ProcessFailedException($process);
            }

            if (!file_exists($outputPath)) {
                error_log("ERROR: Failed to create output file");
                throw new \RuntimeException('Failed to create output file');
            }
            error_log("Output file created successfully. Size: " . filesize($outputPath));

            return $outputFileName;
        } catch (\Exception $e) {
            error_log("Error in BackgroundRemovalService: " . $e->getMessage());
            error_log("Stack trace: " . $e->getTraceAsString());
            throw new \RuntimeException('Failed to process image: ' . $e->getMessage());
        }
    }

    private function createPythonScript(): void
    {
        $scriptContent = <<<'PYTHON'
from rembg import remove
import sys
from PIL import Image

def remove_background(input_path, output_path):
    try:
        # Open the input image
        input_image = Image.open(input_path)
        
        # Remove the background
        output_image = remove(input_image)
        
        # Save the result
        output_image.save(output_path)
        print(f"Background removed successfully. Output saved to: {output_path}")
        
    except Exception as e:
        print(f"Error: {str(e)}", file=sys.stderr)
        sys.exit(1)

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Usage: python remove_background.py <input_path> <output_path>", file=sys.stderr)
        sys.exit(1)
    
    input_path = sys.argv[1]
    output_path = sys.argv[2]
    remove_background(input_path, output_path)
PYTHON;

        file_put_contents($this->scriptPath, $scriptContent);
        chmod($this->scriptPath, 0755);
    }
} 