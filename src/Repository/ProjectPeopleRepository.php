<?php

namespace App\Repository;

use App\Entity\ProjectPeople;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ProjectPeople|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectPeople|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectPeople[]    findAll()
 * @method ProjectPeople[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectPeopleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProjectPeople::class);
    }

    // /**
    //  * @return ProjectPeople[] Returns an array of ProjectPeople objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProjectPeople
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
