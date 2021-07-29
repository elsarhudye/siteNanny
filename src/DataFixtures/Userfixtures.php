<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class Userfixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {


        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {

            $User = new User();
            $User->setName($faker->name);
            $User->setFirstname($faker->firstname);
            $User->setPhonenumber((int)$faker->mobileNumber);
            $User->setEmail($faker->email);
            $User->setPassword($this->encoder->encodePassword($User, '123456'));
            $User->setIsVerified(1);
            $manager->persist($User);
        }



        $manager->flush();
    }
}
