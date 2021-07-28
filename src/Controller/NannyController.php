<?php

namespace App\Controller;

use App\Entity\Nanny;
use App\Form\NannyType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /* 
    #[Route('/nannies', name: 'nanny_liste')]
    public function list(): Response
    {
        return $this->render('nanny/list.html.twig', [
            'controller_name' => 'NannyController',
        ]);
    }
    */
    #[Route('/devenir_une_nanny', name: 'creat_nanny')]
    public function creatNanny(Request $request): Response
    {
        $nanny = new Nanny();
        $form = $this->createForm(NannyType::class, $nanny);
        //dd($form);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($nanny);
            $entityManager->flush();

            return $this->redirectToRoute('page_recherche_une_nanny');
        }

        return $this->render('nanny/formNanny.html.twig', [
            'nanny' => $nanny,
            'form' => $form->createView(),
        ]);
    }
}
