<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SettingsController extends AbstractController
{
    #[Route('/settings', name: 'app_settings')]
    public function settings(): Response
    {
         if (empty($this->getUser())) {
             return $this->redirectToRoute('app_login');
         }

        return $this->render('settings/settings.html.twig');
    }
}
