<?php

namespace App\Controller;

use App\Entity\Quiz;
use App\Entity\QuizResult;
use App\Form\QuizType;
use App\Repository\QuizRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/quiz')]
class QuizController extends AbstractController
{
    public function __construct(
        private QuizRepository $quizRepository,
        private EntityManagerInterface $entityManager
    ) {}

    #[Route('/', name: 'app_quiz')]
    public function index(): Response
    {
        return $this->render('quiz/index.html.twig');
    }

    #[Route('/new', name: 'app_quiz_new')]
    public function new(): Response
    {
        return $this->redirectToRoute('app_quiz');
    }

    #[Route('/{id}', name: 'app_quiz_show')]
    public function show(Quiz $quiz): Response
    {
        return $this->redirectToRoute('app_quiz');
    }

    #[Route('/{id}/take', name: 'app_quiz_take')]
    public function take(Quiz $quiz): Response
    {
        return $this->redirectToRoute('app_quiz');
    }

    #[Route('/{id}/submit', name: 'app_quiz_submit', methods: ['POST'])]
    public function submit(Request $request, Quiz $quiz): Response
    {
        return $this->redirectToRoute('app_quiz');
    }

    #[Route('/result/{id}', name: 'app_quiz_result')]
    public function result(QuizResult $result): Response
    {
        return $this->render('quiz/result.html.twig', [
            'result' => $result
        ]);
    }
} 