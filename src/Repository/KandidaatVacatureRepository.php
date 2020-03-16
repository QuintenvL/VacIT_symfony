<?php

namespace App\Repository;

use App\Entity\KandidaatVacature;
use App\Entity\Vacature;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * @method KandidaatVacature|null find($id, $lockMode = null, $lockVersion = null)
 * @method KandidaatVacature|null findOneBy(array $criteria, array $orderBy = null)
 * @method KandidaatVacature[]    findAll()
 * @method KandidaatVacature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KandidaatVacatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KandidaatVacature::class);
    }

    public function saveSolicitatie($params) {
        $sollicitatie = new KandidaatVacature();

        $em = $this->getEntityManager();

        $vacatureRepo = $em->getRepository(Vacature::class);
        $userRepo = $em->getRepository(User::class);

        $vacature = $vacatureRepo->find($params["vacatureId"]);
        $kandidaat = $userRepo->find($params["userId"]);

        $sollicitatie->setVacature($vacature);
        $sollicitatie->setKandidaat($kandidaat);
        $sollicitatie->setUitgenodigd(false);

        $em->persist($sollicitatie);
        $em->flush();

        return ($sollicitatie);
    }

    public function getVacaturesByIdAndUser(int $id, int $userId){

        return $this->createQueryBuilder('k')
            ->andWhere('k.vacature = :vac')
            ->setParameter('vac', $id)
            ->andWhere('k.kandidaat = :user')
            ->setParameter('user', $userId)
            ->getQuery()
            ->getResult();
    }

    public function getMijnVacatures(int $userId) {
        return $this->createQueryBuilder('k')
            ->andWhere('k.kandidaat = :user')
            ->setParameter('user', $userId)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return KandidaatVacature[] Returns an array of KandidaatVacature objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?KandidaatVacature
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
