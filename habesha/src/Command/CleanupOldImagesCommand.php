<?php

namespace App\Command;

use App\Entity\ImageProcess;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class CleanupOldImagesCommand extends Command
{
    protected static $defaultName = 'app:cleanup-old-images';
    protected static $defaultDescription = 'Removes processed images older than 7 days';
    private $entityManager;
    private $uploadDirectory;
    private $retentionDays;

    public function __construct(
        EntityManagerInterface $entityManager,
        ParameterBagInterface $params
    ) {
        parent::__construct(self::$defaultName);
        $this->entityManager = $entityManager;
        $this->uploadDirectory = $params->get('upload_directory');
        $this->retentionDays = 7; // Keep images for 7 days
    }

    protected function configure(): void
    {
        $this->setDescription(self::$defaultDescription);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Starting cleanup of old images...');

        $date = new \DateTime();
        $date->modify('-' . $this->retentionDays . ' days');

        $qb = $this->entityManager->createQueryBuilder();
        $oldImages = $qb->select('i')
            ->from(ImageProcess::class, 'i')
            ->where('i.createdAt < :date')
            ->setParameter('date', $date)
            ->getQuery()
            ->getResult();

        $count = 0;
        foreach ($oldImages as $image) {
            // Delete original image
            if ($image->getImageName()) {
                $imagePath = $this->uploadDirectory . '/' . $image->getImageName();
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                    $count++;
                }
            }

            // Delete processed image
            if ($image->getResultImageName()) {
                $resultPath = $this->uploadDirectory . '/' . $image->getResultImageName();
                if (file_exists($resultPath)) {
                    unlink($resultPath);
                    $count++;
                }
            }

            // Remove database record
            $this->entityManager->remove($image);
        }

        $this->entityManager->flush();

        $output->writeln(sprintf('Cleanup completed. Removed %d files.', $count));

        return Command::SUCCESS;
    }
} 