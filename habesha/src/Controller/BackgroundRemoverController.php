<?php

namespace App\Controller;

use App\Entity\ImageProcess;
use App\Form\BackgroundRemoverType;
use App\Repository\ImageProcessRepository;
use App\Service\BackgroundRemovalService;
use App\Service\ImageCleanupService;
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
        private BackgroundRemovalService $backgroundRemovalService,
        private ImageCleanupService $imageCleanupService
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
    public function index(Request $request, ImageProcessRepository $imageProcessRepository): Response
    {
        $imageProcess = new ImageProcess();
        $imageProcess->setProcessType('background_remover');
        
        $form = $this->createForm(BackgroundRemoverType::class, $imageProcess);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $uploadedFile = $form->get('imageFile')->getData();
                
                if ($uploadedFile) {
                    // Generate a unique name for the file
                    $fileName = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();
                    
                    // Move the file to the private directory
                    $uploadedFile->move($this->privateUploadDir, $fileName);
                    
                    // Set the file name in the entity
                    $imageProcess->setImageName($fileName);
                    
                    // Save the entity
                    $this->entityManager->persist($imageProcess);
                    $this->entityManager->flush();

                    // Process the image
                    $resultFileName = $this->backgroundRemovalService->removeBackground($imageProcess);
                    
                    // Update the entity with the result
                    $imageProcess->setResultImageName($resultFileName);
                    $this->entityManager->flush();

                    return $this->redirectToRoute('app_background_remover_success', ['id' => $imageProcess->getId()]);
                }
            } catch (\Exception $e) {
                error_log("Error in controller: " . $e->getMessage());
                error_log("Stack trace: " . $e->getTraceAsString());
                $this->addFlash('error', 'Failed to process image: ' . $e->getMessage());
            }
        }

        return $this->render('background_remover/index.html.twig', [
            'form' => $form,
            'recent_processes' => $imageProcessRepository->findBy(
                ['processType' => 'background_remover'],
                ['updatedAt' => 'DESC'],
                5
            )
        ]);
    }

    #[Route('/success/{id}', name: 'app_background_remover_success')]
    public function success(ImageProcess $imageProcess): Response
    {
        return $this->render('background_remover/success.html.twig', [
            'imageProcess' => $imageProcess
        ]);
    }

    #[Route('/result/{id}', name: 'app_background_remover_result')]
    public function result(BackgroundRemover $image): Response
    {
        // Cleanup old images
        $this->imageCleanupService->cleanup();

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