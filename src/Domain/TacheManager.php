<?php

namespace App\Domain;

use App\Entity\Piece;
use App\Entity\Tache;
use App\Services\QrcodeService;
use Doctrine\ORM\EntityManager;
use PDO;
use Symfony\Component\HttpFoundation\Request;

class TacheManager
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getListeTache(): array
    {
        $arrayTache = $this->entityManager->getRepository(Tache::class)->findAll();
        dd($arrayTache);
    }
    public function getListeTacheFiltre(Request $Request): array
    {
        $IDPiece = $Request->get('IDPiece');
        $Piece = $this->entityManager->getRepository(Piece::class)->find($IDPiece);
        return $this->entityManager->getRepository(Tache::class)->findBy(
            ['piece' => $Piece]);

    }

    public function getListePieces(): array
    {
        return $this->entityManager->getRepository(Piece::class)->findAll();
       /* foreach ($arrayPiece as $piece) {
            foreach ($piece->getTache() as $Tache) {
                dd($Tache->getIntitule());
            }
        }*/

    }

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\ORMException
     */
    public function gestionQrCodeTache(Tache $Tache, QrcodeService $qrcodeService)
    {
        if ($Tache->getUrlQrCode() == '') {
            $Tache = $qrcodeService->qrcode($Tache);
            $this->entityManager->flush($Tache);
        }
    }

    /**
     * [Description de la fonction attributionTache]
     * @author Stephen
     * @created 03/11/2021
     */
    public final function attributionTache(): void {

    }


}