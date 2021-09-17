<?php

namespace App\Repository;

use App\Entity\CategorieTache;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieTache|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieTache|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieTache[]    findAll()
 * @method CategorieTache[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieTacheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieTache::class);
    }

    // /**
    //  * @return CategorieTache[] Returns an array of CategorieTache objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategorieTache
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
