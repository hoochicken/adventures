<?php

namespace App\Repository;

use App\Entity\HeroClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
// use Symfony\Bridge\Doctrine\ManagerRegistry;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method HeroClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method HeroClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method HeroClass[]    findAll()
 * @method HeroClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeroClassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HeroClass::class);
    }

    public function transform(HeroClass $class)
    {
        return [
            'id'    => (int) $class->getId(),
            'name' => (string) $class->getName(),
            'label' => (string) $class->getLabel(),
            'attributes' => (string) $class->getAttributes(),
            'state' => (int) $class->getState(),
        ];
    }

    public function transformAll()
    {
        $classes = $this->findAll();
        $classesArray = [];

        foreach ($classes  as $class) {
            $classesArray[] = $this->transform($class);
        }

        return $classesArray;
    }
}
