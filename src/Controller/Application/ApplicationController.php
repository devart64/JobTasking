<?php

namespace App\Controller\Application;

use App\Domain\TacheManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApplicationController extends AbstractController
{
    #[Route('/liste-taches', name: 'liste-taches')]
    public function listeTaches(): Response
    {

        $EntityManager = $this->getDoctrine()->getManager();
        $TacheManager = new TacheManager($EntityManager);
        $ListePieces = $TacheManager->getListePieces();
        return $this->render('Application/Taches/listeTaches.html.twig', [
            'listePieces' => $ListePieces
        ]);
    }
}