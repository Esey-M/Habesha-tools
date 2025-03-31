<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/quiz')]
class QuizController extends AbstractController
{
    #[Route('/{path?}', name: 'app_quiz', requirements: ['path' => '.*'])]
    public function comingSoon(): Response
    {
        return $this->render('quiz/coming_soon.html.twig');
    }
} 