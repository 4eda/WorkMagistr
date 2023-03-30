<?php

namespace App\Repository;

use App\Entity\Menu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Menu>
 *
 * @method Menu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Menu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Menu[]    findAll()
 * @method Menu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Menu::class);
    }

    public function save(Menu $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Menu $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getMenu($id): array
    {
        if ( null === $id) return [];

        $entityManager = $this->getEntityManager();

        return $entityManager->createQuery(
            ' SELECT    menu, item, subitem
                    FROM    App\Entity\Menu menu
                            LEFT JOIN menu.SubMenu item
                            LEFT JOIN item.MenuSubMenu subitem WITH subitem.action = :action
                   WHERE    menu.active = :action 
                            AND menu.id = :id 
                            AND item.action = :action'

        )->setParameters([
            'action' => true,
            'id' => $id,
        ])->getResult(Query::HYDRATE_ARRAY)[0] ?? [];
    }
}
