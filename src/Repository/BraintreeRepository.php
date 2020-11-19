<?php

namespace App\Repository;

use App\Entity\Braintree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Braintree|null find($id, $lockMode = null, $lockVersion = null)
 * @method Braintree|null findOneBy(array $criteria, array $orderBy = null)
 * @method Braintree[]    findAll()
 * @method Braintree[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BraintreeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Braintree::class);
    }

    // /**
    //  * @return Braintree[] Returns an array of Braintree objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Braintree
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
