<?php

namespace App\Command;

use App\Repository\ImageProcessRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class CleanupImagesCommand extends Command
{
    protected static $defaultName = 'app:cleanup-images';

    private EntityManagerInterface $entityManager;
    private ImageProcessRepository $imageProcessRepository;
    private string $uploadDir;
    private SymfonyStyle $io;

    public function __construct(
        EntityManagerInterface $entityManager,
        ImageProcessRepository $imageProcessRepository,
        ParameterBagInterface $params
    ) {
        parent::__construct();
        $this->entityManager = $entityManager;
        $this->imageProcessRepository = $imageProcessRepository;
        $this->uploadDir = $params->get('app.upload_directory');
    }

    protected function configure()
    {
        $this
            ->setDescription('Cleans up old images and their database records')
            ->addOption(
                'days',
                'd',
                InputOption::VALUE_OPTIONAL,
                'Number of days after which images should be deleted',
                7
            )
            ->addOption(
                'dry-run',
                null,
                InputOption::VALUE_NONE,
                'Show what would be deleted without actually deleting'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->io = new SymfonyStyle($input, $output);
        $days = (int) $input->getOption('days');
        $dryRun = $input->getOption('dry-run');

        // Find expired image processes
        $oldProcesses = $this->imageProcessRepository->createQueryBuilder('ip')
            ->where('ip.isPermanent = :permanent')
            ->andWhere('ip.expiresAt < :now')
            ->setParameter('permanent', false)
            ->setParameter('now', new \DateTimeImmutable())
            ->getQuery()
            ->getResult();

        if (empty($oldProcesses)) {
            $this->io->success("No expired images found.");
            return Command::SUCCESS;
        }

        $this->io->section(sprintf(
            "Found %d expired images to process%s",
            count($oldProcesses),
            $dryRun ? ' (DRY RUN)' : ''
        ));

        $deletedFiles = 0;
        $deletedRecords = 0;

        foreach ($oldProcesses as $process) {
            // Delete original image
            $originalPath = $this->uploadDir . '/' . $process->getImageName();
            if (file_exists($originalPath)) {
                if (!$dryRun) {
                    unlink($originalPath);
                }
                $deletedFiles++;
                $this->io->text("Original image: {$process->getImageName()} (expires: {$process->getExpiresAt()->format('Y-m-d H:i:s')})");
            }

            // Delete result image if exists
            if ($process->getResultImageName()) {
                $resultPath = $this->uploadDir . '/' . $process->getResultImageName();
                if (file_exists($resultPath)) {
                    if (!$dryRun) {
                        unlink($resultPath);
                    }
                    $deletedFiles++;
                    $this->io->text("Result image: {$process->getResultImageName()}");
                }
            }

            // Delete database record
            if (!$dryRun) {
                $this->entityManager->remove($process);
                $deletedRecords++;
            }
        }

        if (!$dryRun) {
            $this->entityManager->flush();
        }

        $this->io->success(sprintf(
            "Cleanup complete%s:\n- Deleted %d files\n- Deleted %d database records",
            $dryRun ? ' (DRY RUN)' : '',
            $deletedFiles,
            $deletedRecords
        ));

        return Command::SUCCESS;
    }
} 