<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;



class Userfixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {

            $User = new User();
            $User->setName($faker->name);
            $User->setFirstname($faker->firstname);
            $User->setPhonenumber((int)$faker->mobileNumber);
            $User->setEmail($faker->email);
            $User->setPassword($faker->password);
            $manager->persist($User);
        }



        $manager->flush();
    }
}
