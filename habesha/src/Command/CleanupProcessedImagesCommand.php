<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\Symstyle;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Filesystem\Filesystem;

class CleanupProcessedImagesCommand extends Command
{
    protected static $defaultName = 'app:cleanup-processed-images';
    protected static $defaultDescription = 'Cleans up processed images older than 1 hour';

    private string $privateUploadDir;
    private string $publicUploadDir;
    private Filesystem $filesystem;

    public function __construct(string $privateUploadDir, string $publicUploadDir)
    {
        parent::__construct();
        $this->privateUploadDir = $privateUploadDir;
        $this->publicUploadDir = $publicUploadDir;
        $this->filesystem = new Filesystem();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new Symstyle($input, $output);
        $io->title('Starting cleanup of processed images...');

        // Clean up private uploads
        $this->cleanupDirectory($this->privateUploadDir, $io);
        
        // Clean up public uploads
        $this->cleanupDirectory($this->publicUploadDir, $io);

        $io->success('Cleanup completed successfully!');
        return Command::SUCCESS;
    }

    private function cleanupDirectory(string $directory, Symstyle $io): void
    {
        if (!$this->filesystem->exists($directory)) {
            $io->warning("Directory {$directory} does not exist.");
            return;
        }

        $finder = new Finder();
        $finder->files()
            ->in($directory)
            ->date('before 1 hour ago');

        $count = 0;
        foreach ($finder as $file) {
            $this->filesystem->remove($file->getRealPath());
            $count++;
        }

        $io->text("Removed {$count} files from {$directory}");
    }
} 