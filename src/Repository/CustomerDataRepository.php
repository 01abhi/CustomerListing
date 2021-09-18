<?php

namespace App\Repository;

use App\Entity\CustomerData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CustomerData|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomerData|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerData[]    findAll()
 * @method CustomerData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomerData::class);
    }

    // /**
    //  * @return CustomerData[] Returns an array of CustomerData objects
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
    public function findOneBySomeField($value): ?CustomerData
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
