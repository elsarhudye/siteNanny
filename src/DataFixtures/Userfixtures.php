<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker\Factory;

class Userfixtures extends Fixture
{


    private $userPasswordEncoder;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoderInterface)
    {
        $this->userPasswordEncoder = $userPasswordEncoderInterface;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {

            $user = new User();
            $user->setEmail($faker->email);
            $user->setPassword($this->userPasswordEncoder->encodePassword($user, $faker->password));



            $manager->persist($user);
        }


        $manager->flush();
    }
}
