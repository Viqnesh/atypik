<?php

namespace App\Repository;

use App\Entity\TypeHabitat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeHabitat|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeHabitat|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeHabitat[]    findAll()
 * @method TypeHabitat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeHabitatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeHabitat::class);
    }

    // /**
    //  * @return TypeHabitat[] Returns an array of TypeHabitat objects
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
    public function findOneBySomeField($value): ?TypeHabitat
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
