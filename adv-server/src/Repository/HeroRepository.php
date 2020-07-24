<?php

namespace App\Repository;

use App\Entity\Hero;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
// use Symfony\Bridge\Doctrine\ManagerRegistry;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Hero|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hero|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hero[]    findAll()
 * @method Hero[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeroRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hero::class);
    }

//    /**
//     * @return Hero[] Returns an array of Hero objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hero
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function transform(Hero $hero)
    {
        return [
            'id'    => (int) $hero->getId(),
            'name' => (string) $hero->getName(),
            'le' => (int) $hero->getLe(),
            'le_current' => (int) $hero->getLeCurrent(),
        ];
    }

    public function transformAll()
    {
        $heros = $this->findAll();
        $herosArray = [];

        foreach ($heros as $hero) {
            $herosArray[] = $this->transform($hero);
        }

        return $herosArray;
    }
}
