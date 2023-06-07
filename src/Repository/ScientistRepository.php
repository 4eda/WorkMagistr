<?php

namespace App\Repository;

use App\Entity\Scientist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Scientist>
 *
 * @method Scientist|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scientist|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scientist[]    findAll()
 * @method Scientist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScientistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Scientist::class);
    }

    public function save(Scientist $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Scientist $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getActiveScientist(): array
    {
        $qb = $this->createQueryBuilder('Scientist');
        $qb->select('Scientist');
        $qb->where('Scientist.active = true');

        return $qb->getQuery()->getArrayResult() ?? [];
    }

    public function getScientist($id): array
    {
        $qb = $this->createQueryBuilder('Scientist');
        $qb->select('Scientist');
        $qb->where('Scientist.id = :id');
        $qb->leftJoin('Scientist.mentor', 'mentor');
        $qb->addSelect('mentor');
        $qb->leftJoin('Scientist.student', 'student');
        $qb->addSelect('student');
        $qb->setParameters(['id' => $id]);
        return $qb->getQuery()->getArrayResult()[0] ?? [];
    }
    public function searchScientists($name)
    {
        $qb = $this->createQueryBuilder('s');
        $qb->select('s');
        $qb->where($qb->expr()->orX(
            $qb->expr()->like('s.Name', ':name'),
            $qb->expr()->like('s.surname', ':name'),
            $qb->expr()->like('s.surname_two', ':name')
        ))
            ->setParameter('name', '%'.$name.'%');

        return $qb->getQuery()->getArrayResult();
    }
}
