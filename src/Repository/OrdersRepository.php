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


    public function findLastUnexecuted(): ?Orders
    {
        $result = $this->createQueryBuilder('o')
            ->orderBy('o.input_date', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

        if (!empty($result) && $result[0] instanceof Orders && !$result[0]->isExecuted()) {
            return $result[0];
        }

        return null;
    }

}
