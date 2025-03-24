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
use Symfony\Component\HttpKernel\KernelInterface;

#[Route('/background-remover')]
class BackgroundRemoverController extends AbstractController
{
    private string $uploadDir;
    private string $privateUploadDir;

    public function __construct(
        private EntityManagerInterface $entityManager,
        private BackgroundRemovalService $backgroundRemovalService,
        private ImageCleanupService $imageCleanupService,
        private KernelInterface $kernel
    ) {
        // Get absolute paths
        $this->uploadDir = $kernel->getProjectDir() . '/public/uploads/background-remover';
        $this->privateUploadDir = $kernel->getProjectDir() . '/private/uploads/background-remover';
        
        error_log("Upload directory: " . $this->uploadDir);
        error_log("Private upload directory: " . $this->privateUploadDir);
        
        if (!file_exists($this->uploadDir)) {
            error_log("Creating public upload directory");
            mkdir($this->uploadDir, 0777, true);
        }
        if (!file_exists($this->privateUploadDir)) {
            error_log("Creating private upload directory");
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
                    error_log("Generated filename: " . $fileName);
                    
                    // Move the file to the private directory
                    $targetPath = $this->privateUploadDir . '/' . $fileName;
                    error_log("Moving uploaded file to: " . $targetPath);
                    $uploadedFile->move($this->privateUploadDir, $fileName);
                    
                    if (!file_exists($targetPath)) {
                        error_log("ERROR: File was not moved successfully!");
                        throw new \RuntimeException('Failed to move uploaded file');
                    }
                    error_log("File moved successfully. Size: " . filesize($targetPath));
                    
                    // Set the file name in the entity
                    $imageProcess->setImageName($fileName);
                    
                    // Save the entity
                    $this->entityManager->persist($imageProcess);
                    $this->entityManager->flush();
                    error_log("Saved image process entity with ID: " . $imageProcess->getId());

                    // Process the image
                    error_log("Starting background removal process");
                    $resultFileName = $this->backgroundRemovalService->removeBackground($imageProcess);
                    error_log("Background removal completed. Result file: " . $resultFileName);
                    
                    // Update the entity with the result
                    $imageProcess->setResultImageName($resultFileName);
                    $this->entityManager->flush();

                    error_log("Redirecting to success page");
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
        error_log("Success page for image process ID: " . $imageProcess->getId());
        error_log("Result image name: " . $imageProcess->getResultImageName());
        error_log("Checking if result file exists: " . $this->uploadDir . '/' . $imageProcess->getResultImageName());
        
        if (!file_exists($this->uploadDir . '/' . $imageProcess->getResultImageName())) {
            error_log("WARNING: Result file does not exist!");
        }

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
    public function download(ImageProcess $imageProcess): Response
    {
        $filePath = $this->uploadDir . '/' . $imageProcess->getResultImageName();
        error_log("Download requested for file: " . $filePath);
        
        if (!file_exists($filePath)) {
            error_log("ERROR: Download file not found: " . $filePath);
            throw $this->createNotFoundException('File not found.');
        }

        return $this->file($filePath);
    }
} 