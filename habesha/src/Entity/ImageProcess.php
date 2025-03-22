<?php

namespace App\Entity;

use App\Repository\ImageProcessRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ImageProcessRepository::class)]
#[Vich\Uploadable]
class ImageProcess
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageName = null;

    #[Vich\UploadableField(mapping: 'process_images', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(length: 50)]
    private ?string $processType = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resultImageName = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $expiresAt = null;

    #[ORM\Column]
    private ?bool $isPermanent = false;

    public function __construct()
    {
        $this->updatedAt = new \DateTimeImmutable();
        $this->createdAt = new \DateTimeImmutable();
        $this->expiresAt = (new \DateTimeImmutable())->modify('+7 days');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): static
    {
        $this->imageName = $imageName;
        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getProcessType(): ?string
    {
        return $this->processType;
    }

    public function setProcessType(string $processType): static
    {
        $this->processType = $processType;
        return $this;
    }

    public function getResultImageName(): ?string
    {
        return $this->resultImageName;
    }

    public function setResultImageName(?string $resultImageName): static
    {
        $this->resultImageName = $resultImageName;
        return $this;
    }

    public function getExpiresAt(): ?\DateTimeImmutable
    {
        return $this->expiresAt;
    }

    public function setExpiresAt(\DateTimeImmutable $expiresAt): static
    {
        $this->expiresAt = $expiresAt;
        return $this;
    }

    public function isPermanent(): ?bool
    {
        return $this->isPermanent;
    }

    public function setIsPermanent(bool $isPermanent): static
    {
        $this->isPermanent = $isPermanent;
        return $this;
    }

    public function isExpired(): bool
    {
        return !$this->isPermanent && $this->expiresAt < new \DateTimeImmutable();
    }
} 