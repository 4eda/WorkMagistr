<?php

namespace App\Repository;

use App\Entity\Blog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Blog>
 *
 * @method Blog|null find($id, $lockMode = null, $lockVersion = null)
 * @method Blog|null findOneBy(array $criteria, array $orderBy = null)
 * @method Blog[]    findAll()
 * @method Blog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Blog::class);
    }

    public function save(Blog $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Blog $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public  function getBlog(): array
    {
        $qb = $this->createQueryBuilder('blog');
        $qb->select('blog');
        $qb->where('blog.active = true');
        $qb->leftJoin('blog.categoryBlogs', 'category');
        $qb->addselect('category');

        return $qb->getQuery()->getArrayResult() ?? [];
    }

    public function getIdBlog($slug): array
    {
        $qb = $this->createQueryBuilder('blog');
        $qb->select('blog');
        $qb->where('blog.active = true');
        $qb->andWhere('blog.id = :id');
        $qb->leftJoin('blog.categoryBlogs', 'category');
        $qb->addselect('category');
        $qb->leftJoin('blog.scientist', 'sci');
        $qb->addSelect('sci');
        $qb->setParameter('id', $slug);

        return $qb->getQuery()->getArrayResult()[0] ?? [];
    }

//    /**
//     * @return Blog[] Returns an array of Blog objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Blog
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
