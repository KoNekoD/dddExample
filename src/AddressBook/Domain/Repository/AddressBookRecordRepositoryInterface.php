<?php

declare(strict_types=1);

namespace App\AddressBook\Domain\Repository;

use App\AddressBook\Domain\Entity\AddressBookRecord;

interface AddressBookRecordRepositoryInterface
{
    /** @return AddressBookRecord[] */
    public function list(): array;
}