<?php

namespace App\Controller\Admin;


use App\Entity\Nanny;

use App\Entity\Comment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Nanny');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Accueil', 'fa fa-home', '/');
        yield MenuItem::linktoDashboard('Back Office', 'fa fa-lock');
        yield MenuItem::linkToCrud('Liste des nanny', 'fas fa-user', Nanny::class);
        yield MenuItem::linkToCrud('Comment', 'fas fa-comments', Comment::class);
    }
}
