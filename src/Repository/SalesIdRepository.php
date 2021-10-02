<?php

namespace App\Repository;

use App\Entity\SalesId;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SalesId|null find($id, $lockMode = null, $lockVersion = null)
 * @method SalesId|null findOneBy(array $criteria, array $orderBy = null)
 * @method SalesId[]    findAll()
 * @method SalesId[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SalesIdRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SalesId::class);
    }

    // /**
    //  * @return SalesId[] Returns an array of SalesId objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SalesId
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
