<?php

namespace App\Repository;

use App\Entity\HeroType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HeroType|null find($id, $lockMode = null, $lockVersion = null)
 * @method HeroType|null findOneBy(array $criteria, array $orderBy = null)
 * @method HeroType[]    findAll()
 * @method HeroType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeroTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HeroType::class);
    }

    // /**
    //  * @return HeroType[] Returns an array of HeroType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HeroType
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
