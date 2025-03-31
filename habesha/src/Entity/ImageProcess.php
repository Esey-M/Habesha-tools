<?php

namespace App\Entity;

use App\Repository\ImageProcessRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use DateTime;

#[ORM\Entity(repositoryClass: ImageProcessRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[Vich\Uploadable]
class ImageProcess
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Vich\UploadableField(mapping: 'images', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageName = null;

    #[Vich\UploadableField(mapping: 'result_images', fileNameProperty: 'resultImageName')]
    private ?File $resultImageFile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $resultImageName = null;

    #[ORM\Column(length: 50)]
    private ?string $processType = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $expiresAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
        $this->expiresAt = new \DateTimeImmutable('+7 days');
    }

    #[ORM\PreUpdate]
    public function updateTimestamps(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
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

    public function setResultImageFile(?File $resultImageFile = null): void
    {
        $this->resultImageFile = $resultImageFile;

        if (null !== $resultImageFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getResultImageFile(): ?File
    {
        return $this->resultImageFile;
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

    public function getProcessType(): ?string
    {
        return $this->processType;
    }

    public function setProcessType(string $processType): static
    {
        $this->processType = $processType;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
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

    public function getExpiresAt(): ?\DateTimeImmutable
    {
        return $this->expiresAt;
    }

    public function setExpiresAt(\DateTimeImmutable $expiresAt): static
    {
        $this->expiresAt = $expiresAt;
        return $this;
    }
} 