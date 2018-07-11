<?php

namespace App\Repository;

use App\Entity\TypeUlm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeUlm|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeUlm|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeUlm[]    findAll()
 * @method TypeUlm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeUlmRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeUlm::class);
    }

//    /**
//     * @return TypeUlm[] Returns an array of TypeUlm objects
//     */
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
    public function findOneBySomeField($value): ?TypeUlm
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
