<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
            $category = new Category();
            $category->setTitle('Man');

            $manager->persist($category);

            $category2 = new Category();
            $category2->setTitle('Woman');

            $manager->persist($category2);


        $manager->flush();
    }
}
