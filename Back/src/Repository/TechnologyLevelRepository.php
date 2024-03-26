<?php

namespace App\Repository;

use App\Entity\TechnologyLevel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TechnologyLevel>
 *
 * @method TechnologyLevel|null find($id, $lockMode = null, $lockVersion = null)
 * @method TechnologyLevel|null findOneBy(array $criteria, array $orderBy = null)
 * @method TechnologyLevel[]    findAll()
 * @method TechnologyLevel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TechnologyLevelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TechnologyLevel::class);
    }

    //    /**
    //     * @return TechnologyLevel[] Returns an array of TechnologyLevel objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?TechnologyLevel
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
