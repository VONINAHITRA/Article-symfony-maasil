<?php

namespace App\Repository;

use App\Entity\AuteurEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AuteurEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method AuteurEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method AuteurEntity[]    findAll()
 * @method AuteurEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuteurEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AuteurEntity::class);
    }

    // /**
    //  * @return AuteurEntity[] Returns an array of AuteurEntity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AuteurEntity
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
