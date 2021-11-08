<?php

namespace App\Controller\Utilisateur;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UtilisateurController extends AbstractController
{






    #[Route('/profil', name: 'profil')]
    public function profil(): Response
    {
        return $this->render('Application/utilisateur/profil.html.twig');
    }

}