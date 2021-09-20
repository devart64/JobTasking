<?php

namespace App\Controller\Admin;

use App\Entity\CategorieTache;
use App\Entity\Tache;
use App\Entity\Utilisateur;
use App\Repository\CategorieTacheRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(CategorieTacheCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('API');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Accueil', 'fas fa-home', 'home');
        yield MenuItem::linkToCrud('Pièces concernées', 'fas fa-street-view', CategorieTache::class);
        yield MenuItem::linkToCrud('Tâches', 'fas fa-tasks', Tache::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', Utilisateur::class);
    }
}
