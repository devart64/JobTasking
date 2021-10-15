<?php

namespace App\Domain;

use App\Entity\Piece;
use App\Entity\Tache;
use App\Services\QrcodeService;
use Doctrine\ORM\EntityManager;
use PDO;

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


}