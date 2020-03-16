<?php

namespace App\Repository;

use App\Entity\Vacature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Vacature|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vacature|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vacature[]    findAll()
 * @method Vacature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VacatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vacature::class);
    }

    /**
     * Returns a single vacature by its id
     * @param  int    $id the id of the wanted vacature
     * @return Vacature the founded vacature
     */
    public function getSingleVacature(int $id) {
        return($this->find($id));
    }

    /**
     * Get all the vacatures from the database.
     * @return Vacature[] returns an array of Vacature objects
     */
    public function getAllVacatures(){
        return($this->findAll());
    }

    /**
     * Get the 5 most recent vacatures
     * @return Vacature[] an array of Vacature objects
     */
    public function getRecentVacatures(){
        return $this->createQueryBuilder('v')->orderBy('v.datum', 'DESC')->setMaxResults(5)->getQuery()->getResult();
    }

    // /**
    //  * @return Vacature[] Returns an array of Vacature objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vacature
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
