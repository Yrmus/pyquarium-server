<?php

namespace App\Repository;

use App\Entity\Orders;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Orders|null find($id, $lockMode = null, $lockVersion = null)
 * @method Orders|null findOneBy(array $criteria, array $orderBy = null)
 * @method Orders[]    findAll()
 * @method Orders[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Orders::class);
    }


    /**
     * Returns last unexecuted order. It's called by pyquarium.
     *
     * @return Orders|null
     */
    public function findLastUnexecuted(): ?Orders
    {
        $result = $this->createQueryBuilder('o')
            ->orderBy('o.inputDate', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

        /** @noinspection PhpUndefinedMethodInspection */
        if (!empty($result) && $result[0] instanceof Orders && !$result[0]->isExecuted()) {
            return $result[0];
        }

        return null;
    }

    /**
     * Returns last n executed orders
     *
     * @param int $limit
     * @return Orders|null
     */
    public function findLastExecuted(int $limit = 1): array
    {
        return $this->createQueryBuilder('o')
            ->where('o.executed = 1')
            ->orderBy('o.inputDate', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

}
