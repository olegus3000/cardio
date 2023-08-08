<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Homepage
{
    #[Route('/', name: 'homepage')]
    public function home(): Response
    {
        return new Response('<html lang=""><body>Homepage</body></html>');
    }
}
