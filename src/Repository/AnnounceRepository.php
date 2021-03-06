<?php

namespace App\Repository;

use App\Entity\Announce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Announce|null find($id, $lockMode = null, $lockVersion = null)
 * @method Announce|null findOneBy(array $criteria, array $orderBy = null)
 * @method Announce[]    findAll()
 * @method Announce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnounceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Announce::class);
    }

    public function findAnnouncementsByModel(string $modelName)
    {
        $query = $this->createQueryBuilder('a')
            ->where('a.Model LIKE :nameModel')
            ->setParameter('nameModel', '%' . $modelName . '%')
            ->getQuery();

        return $query->getResult();
    }

    public function findAnnouncementsByPrice(string $priceName)
    {
        $query = $this->createQueryBuilder('a')
            ->where('a.Price')
            ->orderBy('a.Price', 'ASC')
            ->getQuery();

        return $query->getResult();
    }

    /**
     * @return Announce[] Returns an array of Announce objects
     */

    public function findByRegionField(string $region)
    {
        return $this->createQueryBuilder('a')
            ->join('a.region', 'r')
            ->where('r.name = :region')
            ->setParameter(':region', $region)
            ->getQuery()

            ->getResult();
    }


    /*
    public function findOneBySomeField($value): ?Announce
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
