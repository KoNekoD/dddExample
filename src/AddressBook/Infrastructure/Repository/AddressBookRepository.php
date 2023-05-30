<?php

namespace App\AddressBook\Infrastructure\Repository;

use App\AddressBook\Domain\Entity\AddressBookRecord;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AddressBookRecord>
 *
 * @method AddressBookRecord|null find($id, $lockMode = null, $lockVersion = null)
 * @method AddressBookRecord|null findOneBy(array $criteria, array $orderBy = null)
 * @method AddressBookRecord[]    findAll()
 * @method AddressBookRecord[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AddressBookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AddressBookRecord::class);
    }

    public function save(AddressBookRecord $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(AddressBookRecord $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
