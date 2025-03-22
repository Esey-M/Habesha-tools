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
        private EntityManagerInterface $entityManager,
        private QuizRepository $quizRepository
    ) {}

    #[Route('/', name: 'app_quiz')]
    public function index(): Response
    {
        return $this->render('quiz/index.html.twig', [
            'quizzes' => $this->quizRepository->findBy([], ['createdAt' => 'DESC'])
        ]);
    }

    #[Route('/new', name: 'app_quiz_new')]
    public function new(Request $request): Response
    {
        $quiz = new Quiz();
        $form = $this->createForm(QuizType::class, $quiz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($quiz);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_quiz_show', ['id' => $quiz->getId()]);
        }

        return $this->render('quiz/new.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/{id}', name: 'app_quiz_show')]
    public function show(Quiz $quiz): Response
    {
        return $this->render('quiz/show.html.twig', [
            'quiz' => $quiz
        ]);
    }

    #[Route('/{id}/take', name: 'app_quiz_take')]
    public function take(Quiz $quiz): Response
    {
        return $this->render('quiz/take.html.twig', [
            'quiz' => $quiz
        ]);
    }

    #[Route('/{id}/submit', name: 'app_quiz_submit', methods: ['POST'])]
    public function submit(Request $request, Quiz $quiz): Response
    {
        $answers = $request->request->all('answers');
        $score = 0;
        $totalQuestions = count($quiz->getQuestions());

        foreach ($answers as $questionIndex => $answer) {
            $question = $quiz->getQuestions()->get($questionIndex);
            if ($question && $answer == $question->getCorrectOption()) {
                $score++;
            }
        }

        $result = new QuizResult();
        $result->setQuiz($quiz);
        $result->setScore($score);
        $result->setAnswers($answers);
        $result->setCompletedAt(new \DateTimeImmutable());

        $this->entityManager->persist($result);
        $this->entityManager->flush();

        return $this->redirectToRoute('app_quiz_result', ['id' => $result->getId()]);
    }

    #[Route('/result/{id}', name: 'app_quiz_result')]
    public function result(QuizResult $result): Response
    {
        return $this->render('quiz/result.html.twig', [
            'result' => $result
        ]);
    }
} 