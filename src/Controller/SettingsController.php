<?php

namespace App\Controller;

use App\Entity\Card;
use App\Entity\Settings;
use App\Form\SettingsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SettingsController extends AbstractController
{
    #[Route('/settings', name: 'app_settings')]
    public function settings(Request $request): Response
    {
        if (empty($this->getUser())) {
            return $this->redirectToRoute('app_login');
        }

        $settings = new Settings();

        // dummy code - add some example tags to the task
        // (otherwise, the template will render an empty list of tags)
        $card1 = new Card();
        $card1->setSideA('sideA')->setSideB('sideB');
        $settings->getCards()->add($card1);
        $card2 = new Card();
        $card2->setSideA('sideA')->setSideB('sideB');
        $settings->getCards()->add($card2);
        // end dummy code

        $form = $this->createForm(SettingsType::class, $settings);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ... do your form processing, like saving the Task and Tag entities
        }

        return $this->render('settings/settings.html.twig', [
            'form' => $form,
        ]);
    }
}
