<?php

namespace App\Repository;

use App\Entity\RecetteEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecetteEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecetteEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecetteEntity[]    findAll()
 * @method RecetteEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecetteEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecetteEntity::class);
    }

    // /**
    //  * @return RecetteEntity[] Returns an array of RecetteEntity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecetteEntity
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
