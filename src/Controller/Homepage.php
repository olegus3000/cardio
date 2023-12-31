<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Homepage extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function home(): Response
    {
         if (empty($this->getUser())) {
             return $this->redirectToRoute('app_login');
         }

        return $this->render('homepage/homepage.html.twig', ['registerUrl' => 'http://card.io/register', 'error' => 'error']);
    }
}
