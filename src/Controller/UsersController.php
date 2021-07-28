<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    #[Route('/users', name: 'profile_user')]
    public function index(): Response
    {
        return $this->render('users/profile.html.twig', [
            'controller_name' => 'UsersController',
        ]);
    }
}
