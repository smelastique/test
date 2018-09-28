<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Publisher;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class AllFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        $authors = [];
        for ($i = 0; $i < 10; $i++) {
            $author = new Author();
            $author->setName($faker->name);
            $manager->persist($author);
            $authors[] = $author;
        }

        $publishers = [];
        for ($i = 0; $i < 4; $i++) {
            $publisher = new Publisher();
            $publisher->setName($faker->company);
            $manager->persist($publisher);
            $publishers[] = $publisher;
        }

        for($i = 0; $i < 100; $i++) {
            $book = new Book();
            $book->setAuthor($faker->randomElement($authors));
            $book->setPublisher($faker->randomElement($publishers));
            $book->setTitle($faker->sentence());
            $book->setHighlight(($faker->randomDigit > 7));
            $manager->persist($book);
        }

        $manager->flush();
    }
}
