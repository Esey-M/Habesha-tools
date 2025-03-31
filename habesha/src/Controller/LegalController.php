<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/legal')]
class LegalController extends AbstractController
{
    #[Route('/terms', name: 'app_legal_terms')]
    public function terms(): Response
    {
        return $this->render('legal/terms-of-service.html.twig');
    }

    #[Route('/privacy', name: 'app_legal_privacy')]
    public function privacy(): Response
    {
        return $this->render('legal/privacy-policy.html.twig');
    }
} 