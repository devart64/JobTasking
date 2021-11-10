<?php

namespace App\Controller\Application;

use App\Domain\TacheManager;
use App\Entity\Tache;
use App\Entity\TacheRealise;
use App\Services\QrcodeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/liste-taches-filtre', name: 'liste-taches-filtre')]
    public final function listeTachesFiltres(Request $Request): Response
    {
        $EntityManager = $this->getDoctrine()->getManager();
        $TacheManager = new TacheManager($EntityManager);
        $ListePieces = $TacheManager->getListeTacheFiltre($Request);
        return $this->render('Application/Taches/listeTaches.html.twig', [
            'listePieces' => $ListePieces
        ]);
    }

    #[Route('/tache/{id}', name: 'tache')]
    public function tache($id, QrcodeService $qrcodeService): Response
    {

        $EntityManager = $this->getDoctrine()->getManager();
        $Tache = $EntityManager->getRepository(Tache::class)->find($id);

        $TacheManager = new TacheManager($EntityManager);
        $TacheManager->gestionQrCodeTache($Tache, $qrcodeService);

        if (in_array('ROLE_USER', $this->getUser()->getRoles())) {
            $TacheRealise = new TacheRealise();
            $TacheRealise->setIDUtilisateur($this->getUser()->getID());
            $TacheRealise->setDate(new \DateTime());
            $TacheRealise->setIDTache($id);
            $EntityManager->persist($TacheRealise);
            $EntityManager->flush();
        }


        // si l'utilisateur connecté à le role user alors on lui enregistre une tache réalisée
        // par la suite il faudra tester les contraintes temporelles

        return $this->render('Application/Taches/tache.html.twig', [
            'Tache' => $Tache
        ]);
    }
}