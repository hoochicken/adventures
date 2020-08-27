<?php

namespace App\Repository;

use App\Entity\Item2hero;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Item2hero|null find($id, $lockMode = null, $lockVersion = null)
 * @method Item2hero|null findOneBy(array $criteria, array $orderBy = null)
 * @method Item2hero[]    findAll()
 * @method Item2hero[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Item2heroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Item2hero::class);
    }

    // /**
    //  * @return Item2hero[] Returns an array of Item2hero objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Item2hero
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
