<?php

namespace App\AddressBook\Infrastructure\Repository;

use App\AddressBook\Domain\Entity\AddressBookRecord;
use App\AddressBook\Domain\Repository\AddressBookRecordRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AddressBookRecordRepository
    extends ServiceEntityRepository
    implements AddressBookRecordRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AddressBookRecord::class);
    }

    public function list(): array
    {
        return $this->findAll();
    }
}
