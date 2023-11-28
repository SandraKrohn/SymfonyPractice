<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class FishController extends AbstractController
{
    #[Route('/fish/{name}', name: 'app_fish', defaults:['name' => 'fish'], methods:['GET'])]
    public function index($name): JsonResponse
    {
        return $this->json([
            'message' => '*making ' . $name . ' noises*',
            'path' => 'src/Controller/FishController.php',
        ]);
    }
}
