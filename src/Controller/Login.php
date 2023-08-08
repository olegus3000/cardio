<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Login
{
    #[Route('/login', name: 'login')]
    public function home(): Response
    {
        return new Response('<html lang=""><body>Login</body></html>');
    }
}
