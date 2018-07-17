<?php

namespace App\Repository;

use App\Entity\Morpion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Morpion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Morpion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Morpion[]    findAll()
 * @method Morpion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MorpionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Morpion::class);
    }

//    /**
//     * @return Morpion[] Returns an array of Morpion objects
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
    public function findOneBySomeField($value): ?Morpion
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
