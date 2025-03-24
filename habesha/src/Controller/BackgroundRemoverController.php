<?php

namespace App\Controller;

use App\Entity\ImageProcess;
use App\Form\BackgroundRemoverType;
use App\Repository\ImageProcessRepository;
use App\Service\BackgroundRemovalService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/background-remover')]
class BackgroundRemoverController extends AbstractController
{
    private string $uploadDir;
    private string $privateUploadDir;

    public function __construct(
        private EntityManagerInterface $entityManager,
        private BackgroundRemovalService $backgroundRemovalService
    ) {
        $this->uploadDir = dirname(__DIR__, 2) . '/public/uploads/background-remover';
        $this->privateUploadDir = dirname(__DIR__, 2) . '/private/uploads/background-remover';
        
        if (!file_exists($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }
        if (!file_exists($this->privateUploadDir)) {
            mkdir($this->privateUploadDir, 0777, true);
        }
    }

    #[Route('/', name: 'app_background_remover')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(BackgroundRemoverType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $file = $data['image'];

            if ($file) {
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $privatePath = $this->privateUploadDir . '/' . $fileName;
                $publicPath = $this->uploadDir . '/' . $fileName;

                // Store original file in private directory
                $file->move($this->privateUploadDir, $fileName);

                // Process the image
                $processedImage = $this->backgroundRemovalService->removeBackground($privatePath);

                // Save processed image in public directory
                $processedImage->save($publicPath);

                // Create a record in the database
                $image = new BackgroundRemover();
                $image->setOriginalName($file->getClientOriginalName());
                $image->setFileName($fileName);
                $image->setProcessedAt(new \DateTimeImmutable());
                $image->setUserId($this->getUser() ? $this->getUser()->getId() : null);

                $this->entityManager->persist($image);
                $this->entityManager->flush();

                return $this->redirectToRoute('app_background_remover_result', ['id' => $image->getId()]);
            }
        }

        return $this->render('background_remover/index.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/success/{id}', name: 'app_background_remover_success')]
    public function success(ImageProcess $imageProcess): Response
    {
        if (!$imageProcess->getResultImageName()) {
            throw $this->createNotFoundException('No processed image found.');
        }

        return $this->render('background_remover/success.html.twig', [
            'image_process' => $imageProcess,
        ]);
    }

    #[Route('/result/{id}', name: 'app_background_remover_result')]
    public function result(BackgroundRemover $image): Response
    {
        // Check if the user has access to this image
        if ($this->getUser() && $image->getUserId() !== $this->getUser()->getId()) {
            throw $this->createAccessDeniedException('You do not have access to this image.');
        }

        return $this->render('background_remover/result.html.twig', [
            'image' => $image
        ]);
    }

    #[Route('/download/{id}', name: 'app_background_remover_download')]
    public function download(BackgroundRemover $image): Response
    {
        // Check if the user has access to this image
        if ($this->getUser() && $image->getUserId() !== $this->getUser()->getId()) {
            throw $this->createAccessDeniedException('You do not have access to this image.');
        }

        $filePath = $this->uploadDir . '/' . $image->getFileName();
        
        if (!file_exists($filePath)) {
            throw $this->createNotFoundException('File not found.');
        }

        return $this->file($filePath, $image->getOriginalName());
    }
} 