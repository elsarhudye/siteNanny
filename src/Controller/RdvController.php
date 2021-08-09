<?php

namespace App\Controller;

use App\Entity\Rdv;
use App\Entity\User;
use App\Entity\Nanny;
use App\Form\RdvFormType;
use App\Repository\NannyRepository;
use App\Repository\RdvRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RdvController extends AbstractController
{
    #[Route('/rdv/create', name: 'rdv_create')]
    public function rdvCreate(Request $request, UserRepository $userRepository, NannyRepository $nannyRepository): Response
    {
        //dd($nannyRepository->findAll());
        $rdv = new Rdv();
        $form = $this->createForm(RdvFormType::class, $rdv);
        $form->add('createdBy', EntityType::class, [
            'class' => Nanny::class,
            // 'choices' => $nannyRepository->findAll()
        ])

            // ->add('reservedBy', EntityType::class, [
            //     'class' => User::class,
            //     //'choices' => $userRepository->findAll()

            // ])
            ->add('Enregistrer', SubmitType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rdv);
            $entityManager->flush();

            $this->addFlash('success', 'Rendez-vous Enregistré');


            return $this->redirectToRoute('rdv_create');
        }

        return $this->render('rdv/add.html.twig', [
            'form' => $form->createView()
        ]);
    }


    #[Route('/rdv/show', name: 'rdv_show')]
    public function rdvShow(RdvRepository $rdvRepository)
    {
        //dd($rdvRepository->findAll());
        $rdv = $rdvRepository->findAll();
        return $this->render('rdv/show.html.twig', [
            'rdvs' => $rdv
        ]);
    }
}
