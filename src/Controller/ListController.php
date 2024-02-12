<?php

namespace App\Controller;

use App\Entity\Settings;
use App\Form\ListType;
use App\Repository\CardRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    #[Route('/list', name: 'app_list')]
    public function list(Request $request, CardRepository $cardRepository): Response
    {
        if (empty($this->getUser())) {
            return $this->redirectToRoute('app_login');
        }

        $settings = new Settings();

        $cards = $cardRepository->findAll();

        foreach ($cards as $card) {
            $settings->getCards()->add($card);
        }

        $form = $this->createForm(ListType::class, $settings);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ... do your form processing, like saving the Task and Tag entities
        }

        return $this->render('list/list.html.twig', [
            'form' => $form,
        ]);

    }
}
