<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProductFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++) {
            $product = new Product();
            $product->setTitle($faker->sentence(2, true))
                ->setContent($faker->sentence(5, true))
                ->setPrice($faker->randomFloat(2, 20, 100))
                ->setImage($faker->imageUrl(640, 480));

            $manager->persist($product);
        }

        $manager->flush();
    }
}
