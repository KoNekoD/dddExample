<?php

declare(strict_types=1);

namespace App\AddressBook\Application\Service;

use App\AddressBook\Application\DTO\AddressBookMutateDTO;
use App\AddressBook\Application\DTO\AddressBookRecordDTO;
use App\AddressBook\Domain\Entity\AddressBookRecord;
use App\AddressBook\Domain\Repository\AddressBookRecordRepositoryInterface;

class AddressBookManagerService
{
    public function __construct(
        private readonly AddressBookRecordRepositoryInterface $addressBookRecordRepository
    )
    {
    }

    /** @return AddressBookRecordDTO[] */
    public function list(): array
    {
        $entities = $this->addressBookRecordRepository->list();

        return array_map(
            static fn(
                AddressBookRecord $e
            ) => AddressBookRecordDTO::fromEntity($e),
            $entities
        );
    }

    public function edit(
        AddressBookRecord $addressBookRecord, AddressBookMutateDTO $mutateDTO
    ): void {
        $addressBookRecord->updateInformation(
            $mutateDTO->name,
            $mutateDTO->telephone,
            $mutateDTO->birthday,
            $mutateDTO->address
        );
    }
}