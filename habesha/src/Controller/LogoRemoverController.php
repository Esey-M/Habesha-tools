<?php

namespace App\Controller;

use App\Entity\ImageProcess;
use App\Form\LogoRemoverType;
use App\Repository\ImageProcessRepository;
use App\Service\LogoRemovalService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/logo-remover')]
class LogoRemoverController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private LogoRemovalService $logoRemovalService
    ) {}

    #[Route('/', name: 'app_logo_remover')]
    public function index(Request $request, ImageProcessRepository $imageProcessRepository): Response
    {
        $imageProcess = new ImageProcess();
        $imageProcess->setProcessType('logo_remover');
        
        $form = $this->createForm(LogoRemoverType::class, $imageProcess);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                // First persist the entity to save the file
                $this->entityManager->persist($imageProcess);
                $this->entityManager->flush();

                return $this->redirectToRoute('app_logo_remover_edit', ['id' => $imageProcess->getId()]);
            } catch (\Exception $e) {
                $this->addFlash('error', 'Failed to upload image: ' . $e->getMessage());
            }
        }

        return $this->render('logo_remover/index.html.twig', [
            'form' => $form,
            'recent_processes' => $imageProcessRepository->findBy(
                ['processType' => 'logo_remover'],
                ['updatedAt' => 'DESC'],
                5
            )
        ]);
    }

    #[Route('/edit/{id}', name: 'app_logo_remover_edit')]
    public function edit(ImageProcess $imageProcess): Response
    {
        if ($imageProcess->getProcessType() !== 'logo_remover') {
            throw $this->createNotFoundException('Image not found');
        }

        return $this->render('logo_remover/edit.html.twig', [
            'image' => $imageProcess
        ]);
    }

    #[Route('/process/{id}', name: 'app_logo_remover_process', methods: ['POST'])]
    public function process(Request $request, ImageProcess $imageProcess): Response
    {
        if ($imageProcess->getProcessType() !== 'logo_remover') {
            return $this->json(['error' => 'Invalid image'], Response::HTTP_BAD_REQUEST);
        }

        try {
            $data = json_decode($request->getContent(), true);
            $coordinates = $data['coordinates'] ?? null;

            if (!$coordinates) {
                return $this->json(['error' => 'No coordinates provided'], Response::HTTP_BAD_REQUEST);
            }

            $resultFileName = $this->logoRemovalService->removeLogo($imageProcess, $coordinates);
            $imageProcess->setResultImageName($resultFileName);
            $this->entityManager->flush();

            return $this->json([
                'success' => true,
                'resultUrl' => '/uploads/images/' . $resultFileName
            ]);
        } catch (\Exception $e) {
            return $this->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    #[Route('/success/{id}', name: 'app_logo_remover_success')]
    public function success(ImageProcess $imageProcess): Response
    {
        if ($imageProcess->getProcessType() !== 'logo_remover' || !$imageProcess->getResultImageName()) {
            throw $this->createNotFoundException('Result not found');
        }

        return $this->render('logo_remover/success.html.twig', [
            'image' => $imageProcess
        ]);
    }
} 