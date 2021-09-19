<?php

namespace App\Repository;

use App\Entity\TacheRealise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TacheRealise|null find($id, $lockMode = null, $lockVersion = null)
 * @method TacheRealise|null findOneBy(array $criteria, array $orderBy = null)
 * @method TacheRealise[]    findAll()
 * @method TacheRealise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TacheRealiseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TacheRealise::class);
    }

    // /**
    //  * @return TacheRealise[] Returns an array of TacheRealise objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TacheRealise
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
