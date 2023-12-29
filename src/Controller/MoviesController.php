<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
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

    private $movieRepository;
    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    #[Route('/movies',  methods: ['GET'])]
    public function index(): Response
    {
        $movies = $this->movieRepository->findAll();

        return $this->render('movies/index.html.twig', ['movies' => $movies, 'app' => ['user' => 'Lem']]);
    }

    #[Route('/movies/{id}', methods: ['GET'])]
    public function show($id): Response
    {
        $movie = $this->movieRepository->find($id);

        return $this->render('movies/show.html.twig', [
            'movie' => $movie,
            'app' => ['user' => 'Lem']
        ]);
    }
}
