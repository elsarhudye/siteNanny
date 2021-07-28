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
            $Nanny->setName($faker->lastName);
            $Nanny->setFirstname($faker->firstNameFemale);
            $Nanny->setEmail($faker->email);
            $Nanny->setPassword($faker->password);
            $Nanny->setAge(rand(18, 30));
            $Nanny->setAdress($faker->streetAddress);
            $Nanny->setCity($faker->city);
            $Nanny->setZipcode($faker->postcode);
            $Nanny->setRegion($faker->region);
            $Nanny->setValid(rand(0, 1));
            $manager->persist($Nanny);
        }



        $manager->flush();
    }
}
