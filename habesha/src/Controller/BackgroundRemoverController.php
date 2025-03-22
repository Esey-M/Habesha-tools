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
    public function __construct(
        private EntityManagerInterface $entityManager,
        private BackgroundRemovalService $backgroundRemovalService
    ) {}

    #[Route('/', name: 'app_background_remover')]
    public function index(Request $request, ImageProcessRepository $imageProcessRepository): Response
    {
        $imageProcess = new ImageProcess();
        $imageProcess->setProcessType('background_remover');
        
        $form = $this->createForm(BackgroundRemoverType::class, $imageProcess);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                // Debug information about the uploaded file
                $uploadedFile = $form->get('imageFile')->getData();
                error_log("Uploaded file info:");
                error_log("Original name: " . $uploadedFile->getClientOriginalName());
                error_log("MIME type: " . $uploadedFile->getMimeType());
                error_log("Size: " . $uploadedFile->getSize() . " bytes");
                error_log("Error code: " . $uploadedFile->getError());
                
                // First persist the entity to save the file
                $this->entityManager->persist($imageProcess);
                $this->entityManager->flush();
                
                // Now process the image
                $resultFileName = $this->backgroundRemovalService->removeBackground($imageProcess);
                
                // Update the entity with the result
                $imageProcess->setResultImageName($resultFileName);
                
                // Save the result
                $this->entityManager->flush();

                return $this->redirectToRoute('app_background_remover_success', ['id' => $imageProcess->getId()]);
            } catch (\Exception $e) {
                error_log("Error in controller: " . $e->getMessage());
                error_log("Stack trace: " . $e->getTraceAsString());
                $this->addFlash('error', 'Failed to process image: ' . $e->getMessage());
            }
        } elseif ($form->isSubmitted()) {
            error_log("Form validation errors: " . json_encode($form->getErrors(true)));
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
        if (!$imageProcess->getResultImageName()) {
            throw $this->createNotFoundException('No processed image found.');
        }

        return $this->render('background_remover/success.html.twig', [
            'image_process' => $imageProcess,
        ]);
    }
} 