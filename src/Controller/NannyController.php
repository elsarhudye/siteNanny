<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NannyController extends AbstractController
{
    #[Route('/', name: 'nanny_home')]
    public function index(): Response
    {
        return $this->render('nanny/home.html.twig', [
            'controller_name' => 'NannyController',
        ]);
    }

    #[Route('/nannies', name: 'nanny_liste')]
    public function list(): Response
    {
        return $this->render('nanny/list.html.twig', [
            'controller_name' => 'NannyController',
        ]);
    }
}
