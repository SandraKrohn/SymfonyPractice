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

    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/movies')]
    public function index(): Response
    {
        // loads repository file (here: MovieRepository.php)
        $repository = $this->em->getRepository(Movie::class);
        // this is a SELECT *
        // $movies = $repository->findAll();

        // SELECT * FROM movies WHERE id = 5
        // $movies = $repository->find(5);
        
        // returns array of obj with given condition (which is a key-value pair), here: ordered by ID
        // $movies = $repository->findBy([], ['id' => 'DESC']);
        
        // same as above, but only selecting one
        // $movies = $repository->findOneBy(['id' => 5, 'title' => 'Pokemon'], ['id' => 'DESC']);
        
        // counts everything in the table
        $movies = $repository->count([]);
        
        // output of the entity name
        $movies = $repository->getClassName();

        // dd = "dump and die"; same as vardump, but cleaner
        dd($movies);
        return $this->render('index.html.twig');
    }
}
