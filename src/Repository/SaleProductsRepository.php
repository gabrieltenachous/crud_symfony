<?php

namespace App\Repository;

use App\Entity\SaleProducts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SaleProducts|null find($id, $lockMode = null, $lockVersion = null)
 * @method SaleProducts|null findOneBy(array $criteria, array $orderBy = null)
 * @method SaleProducts[]    findAll()
 * @method SaleProducts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SaleProductsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SaleProducts::class);
    }

    // /**
    //  * @return SaleProducts[] Returns an array of SaleProducts objects
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
    public function findOneBySomeField($value): ?SaleProducts
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
