<?php

namespace App\Controller;

use App\Form\CommentType;
use App\Repository\NannyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/accueil', name: 'page_accueil')]
    public function accueil(): Response
    {
        return $this->render('page/accueil.html.twig', [
            'controller_name' => 'PageController je suis ici',
        ]);
    }

    #[Route('/contact', name: 'page_contact')]
    public function index(Request $request): Response
    {

        return $this->render('page/contact.html.twig', [
            'controller_name' => 'PageController',

        ]);
    }
    #[Route('/comment', name: 'page_comment')]
    public function comment(Request $request): Response
    {
        $form = $this->createForm(CommentType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($form->getData());
        }
        return $this->render('page/comment.html.twig', [
            'controller_name' => 'PageController',

            'form' => $form->createView(),
        ]);
    }
    #[Route('/recherche-une-nanny', name: 'page_recherche_une_nanny')]
    public function recherche(Request $request, NannyRepository $nannyRepository): Response
    {
        //$nannies = $nannyRepository->findAll();
        $nannies = $nannyRepository->findBy(['valid' => true], ['name' => 'ASC']);

        return $this->render('page/liste.html.twig', [
            'nannies' => $nannies
        ]);
    }
}
