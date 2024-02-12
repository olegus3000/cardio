<?php

namespace App\Controller;

use App\Repository\CardRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Homepage extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function home(CardRepository $cardRepository): Response
    {
         if (empty($this->getUser())) {
             return $this->redirectToRoute('app_login');
         }

         $cards = $cardRepository->findAll();
         $card = $cards[rand(0, count($cards) -1)];

        return $this->render('homepage/homepage.html.twig', ['registerUrl' => 'http://card.io/register', 'error' => 'error', 'card' => $card]);
    }
}
