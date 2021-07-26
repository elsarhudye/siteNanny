<?php

namespace App\Repository;

use App\Entity\Gardes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gardes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gardes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gardes[]    findAll()
 * @method Gardes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GardesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gardes::class);
    }

    // /**
    //  * @return Gardes[] Returns an array of Gardes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gardes
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
