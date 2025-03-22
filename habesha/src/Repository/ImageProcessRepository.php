<?php

namespace App\Repository;

use App\Entity\ImageProcess;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ImageProcess>
 *
 * @method ImageProcess|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageProcess|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageProcess[]    findAll()
 * @method ImageProcess[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageProcessRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageProcess::class);
    }

    public function save(ImageProcess $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ImageProcess $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return ImageProcess[] Returns an array of ImageProcess objects
     */
    public function findByProcessType(string $processType): array
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.processType = :val')
            ->setParameter('val', $processType)
            ->orderBy('i.updatedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
} 