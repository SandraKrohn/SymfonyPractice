<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('Pokemon');
        $movie->setReleaseYear(1998);
        $movie->setDescription('Gotta catch em all');
        $movie->setImagePath('https://irs.www.warnerbros.com/keyart-jpeg/pokemon_first_movie_keyart.jpg');
        // adding data to pivot table
        $movie->addActor($this->getReference('actor_1'));
        $movie->addActor($this->getReference('actor_2'));
        // SQL 'INSERT' statement with the data above (only storing it, not yet performing)
        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle('The Wizard of Oz');
        $movie2->setReleaseYear(1939);
        $movie2->setDescription('Follow the Yellow Brick Road!');
        $movie2->setImagePath('https://kidlitreviews.files.wordpress.com/2013/09/wizar-of-oz-bracken.jpg?w=236');
        $movie2->addActor($this->getReference('actor_3'));
        $movie2->addActor($this->getReference('actor_4'));
        $manager->persist($movie2);

        // this makes sure that both queries can be performed at the same time
        $manager->flush();
    }
}