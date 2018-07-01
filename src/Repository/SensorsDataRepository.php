<?php

namespace App\Repository;

use App\Entity\SensorsData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SensorsData|null find($id, $lockMode = null, $lockVersion = null)
 * @method SensorsData|null findOneBy(array $criteria, array $orderBy = null)
 * @method SensorsData[]    findAll()
 * @method SensorsData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SensorsDataRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SensorsData::class);
    }

//    /**
//     * @return SensorsData[] Returns an array of SensorsData objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SensorsData
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
