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

        for ($i = 1; $i < 10; $i++) {
            $category = $this->getReference('category_' . $faker->numberBetween(1, 4));
            //$this->addReference('category_' . $i, $Category);

            $Nanny = new Nanny();

            $Nanny->setCategory($category);


            $Nanny->setName($faker->lastName);
            $Nanny->setFirstname($faker->firstNameFemale);
            $Nanny->setEmail($faker->email);
            $Nanny->setPassword($faker->password);
            $Nanny->setAge(rand(18, 30));
            $Nanny->setAdress($faker->streetAddress);
            $Nanny->setCity($faker->city);
            $Nanny->setZipcode($faker->numberBetween(10000, 100000));
            $Nanny->setRegion($faker->region);
            $Nanny->setValid(rand(0, 1));
            //$Nanny->setCategory();
            $manager->persist($Nanny);
        }



        $manager->flush();
    }
}
