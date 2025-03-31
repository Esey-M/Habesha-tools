<?php

namespace App\Controller;

use App\Entity\ImageProcess;
use App\Form\BackgroundRemoverType;
use App\Service\BackgroundRemovalService;
use App\Service\UsageLimitService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\RateLimiter\RateLimiterFactory;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;

class BackgroundRemoverController extends AbstractController
{
    public function __construct(
        private BackgroundRemovalService $backgroundRemovalService,
        private EntityManagerInterface $entityManager,
        private UsageLimitService $usageLimitService,
        private RateLimiterFactory $backgroundRemoverLimiter
    ) {}

    #[Route('/background-remover', name: 'app_background_remover')]
    public function index(Request $request): Response
    {
        // Check rate limit
        $limiter = $this->backgroundRemoverLimiter->create($request->getClientIp());
        if (false === $limiter->consume(1)->isAccepted()) {
            throw new TooManyRequestsHttpException(null, 'Too many requests. Please try again later.');
        }

        $imageProcess = new ImageProcess();
        $imageProcess->setProcessType('background_remover');
        
        $form = $this->createForm(BackgroundRemoverType::class, $imageProcess);
        $form->handleRequest($request);

        $error = null;
        $success = null;

        try {
            if ($form->isSubmitted() && $form->isValid()) {
                if (!$this->usageLimitService->canProcess()) {
                    return $this->redirectToRoute('app_register', [
                        'message' => 'You have reached your daily limit. Please register or login to continue using our services.'
                    ]);
                }

                // Save the uploaded file first
                $this->entityManager->persist($imageProcess);
                $this->entityManager->flush();

                // Process the image
                $resultFileName = $this->backgroundRemovalService->removeBackground($imageProcess);
                
                if ($resultFileName) {
                    // Update the entity with the result
                    $imageProcess->setResultImageName($resultFileName);
                    $this->entityManager->persist($imageProcess);
                    $this->entityManager->flush();
                    
                    // Increment usage after successful processing
                    $this->usageLimitService->incrementUsage();
                    $success = 'Background removed successfully!';
                }
            }
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $this->addFlash('error', $error);
        }

        // Get recent processes
        $recentProcesses = $this->entityManager
            ->getRepository(ImageProcess::class)
            ->findBy(
                ['processType' => 'background_remover'],
                ['updatedAt' => 'DESC'],
                5
            );

        return $this->render('background_remover/index.html.twig', [
            'form' => $form->createView(),
            'error' => $error,
            'success' => $success,
            'recentProcesses' => $recentProcesses,
            'remainingFreeUsage' => $this->usageLimitService->getRemainingFreeUsage(),
            'isAuthenticated' => $this->getUser() !== null,
        ]);
    }

    #[Route('/background-remover/success/{id}', name: 'app_background_remover_success')]
    public function success(ImageProcess $imageProcess): Response
    {
        if (!$imageProcess->getResultImageName()) {
            throw $this->createNotFoundException('No processed image found.');
        }

        return $this->render('background_remover/success.html.twig', [
            'image_process' => $imageProcess,
        ]);
    }

    #[Route('/background-remover/batch/{ids}', name: 'app_background_remover_batch')]
    public function batchProcess(string $ids): Response
    {
        $imageIds = explode(',', $ids);
        $images = $this->entityManager->getRepository(ImageProcess::class)
            ->findBy(['id' => $imageIds]);

        return $this->render('background_remover/batch.html.twig', [
            'images' => $images
        ]);
    }

    #[Route('/background-remover/process/{id}', name: 'app_background_remover_process', methods: ['POST'])]
    public function process(ImageProcess $imageProcess): JsonResponse
    {
        try {
            $result = $this->backgroundRemovalService->removeBackground($imageProcess);
            
            // Update the entity with the result
            $imageProcess->setResultImageName($result);
            $this->entityManager->persist($imageProcess);
            $this->entityManager->flush();
            
            // Increment usage after successful processing
            $this->usageLimitService->incrementUsage();
            
            return new JsonResponse([
                'success' => true,
                'resultUrl' => '/uploads/images/' . $result
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 