<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    // route parameter "defaults" will allow to access the URL (/movies) without a name parameter
    // this block is to show how JSON can be returned
    // #[Route('/movies/{name}', defaults: ['name' => null], methods:['GET'])]
    // public function index($name): JsonResponse
    // {
    //     return $this->json([
    //         'message' => 'The movie is ' . $name,
    //         'path' => 'src/Controller/MoviesController.php',
    //     ]);
    // }

    #[Route('/soundtracks')]
    public function soundtrackIndex(): Response
    {
        $movies = ["The Wizard of Oz", "The Hunchback of Notre Dame", "Alice in Wonderland"];

        // array('index 1', 'index 2') is just another way to write $array = ['index 1', 'index 2']
        // also works for associative arrays with key-value pairs
        return $this->render('index.html.twig', array(
            'movies' => $movies
        ));
    }

    #[Route('/movies', methods:['POST'])]
    public function createMovie(): JsonResponse
    {
        return $this->json([
            'message' => 'Here is a  movie',
            'path' => 'src/Controller/MoviesController.php',
        ]);
    }
}
