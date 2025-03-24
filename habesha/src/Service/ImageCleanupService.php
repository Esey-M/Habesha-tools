<?php

namespace App\Service;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ImageCleanupService
{
    private const SESSION_KEY = 'processed_images';
    private const MAX_AGE_HOURS = 1; // Images will be deleted after 1 hour

    public function __construct(
        private string $publicUploadDir,
        private string $privateUploadDir,
        private SessionInterface $session,
        private Filesystem $filesystem
    ) {}

    public function trackImage(string $fileName): void
    {
        $images = $this->session->get(self::SESSION_KEY, []);
        $images[] = [
            'fileName' => $fileName,
            'timestamp' => time()
        ];
        $this->session->set(self::SESSION_KEY, $images);
    }

    public function cleanup(): void
    {
        $images = $this->session->get(self::SESSION_KEY, []);
        $currentTime = time();

        foreach ($images as $key => $image) {
            $age = $currentTime - $image['timestamp'];
            
            // Delete if older than MAX_AGE_HOURS
            if ($age > (self::MAX_AGE_HOURS * 3600)) {
                $this->deleteImage($image['fileName']);
                unset($images[$key]);
            }
        }

        $this->session->set(self::SESSION_KEY, array_values($images));
    }

    private function deleteImage(string $fileName): void
    {
        $publicPath = $this->publicUploadDir . '/' . $fileName;
        $privatePath = $this->privateUploadDir . '/' . $fileName;

        if ($this->filesystem->exists($publicPath)) {
            $this->filesystem->remove($publicPath);
        }

        if ($this->filesystem->exists($privatePath)) {
            $this->filesystem->remove($privatePath);
        }
    }
} 