<?php

namespace App\Repository;

use App\Entity\FTopics;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FTopics|null find($id, $lockMode = null, $lockVersion = null)
 * @method FTopics|null findOneBy(array $criteria, array $orderBy = null)
 * @method FTopics[]    findAll()
 * @method FTopics[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FTopicsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FTopics::class);
    }

//    /**
//     * @return FTopics[] Returns an array of FTopics objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FTopics
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
