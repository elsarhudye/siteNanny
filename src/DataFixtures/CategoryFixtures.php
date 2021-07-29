<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $categoryType = [
            1 => ['name' => 'sortie école'],
            2 => ['name' => 'sortie crèche'],
            3 => ['name' => 'sos du soir'],
            4 => ['name' => 'temps plein'],
        ];

        foreach ($categoryType as $key => $value) {

            $Category = new Category();
            $Category->setName($value['name']);


            $manager->persist($Category);
            $this->addReference('category_' . $key, $Category);
        }



        $manager->flush();
    }
}
