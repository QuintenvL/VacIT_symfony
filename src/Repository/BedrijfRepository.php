<?php

namespace App\Repository;

use App\Entity\Bedrijf;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Bedrijf|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bedrijf|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bedrijf[]    findAll()
 * @method Bedrijf[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BedrijfRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bedrijf::class);
    }

    // /**
    //  * @return Bedrijf[] Returns an array of Bedrijf objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bedrijf
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
