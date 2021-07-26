<?php

namespace App\DataFixtures;

use App\Entity\Nanny;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class NannyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {

            $Nanny = new Nanny();
            $Nanny->setName($faker->name);
            $Nanny->setAge(rand(18, 30));
            $Nanny->setCity($faker->city);
            $Nanny->setValid(rand(0, 1));

            $manager->persist($Nanny);
        }



        $manager->flush();
    }
}
