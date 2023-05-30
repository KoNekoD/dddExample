<?php

declare(strict_types=1);

namespace App\AddressBook\Application\DTO;

use App\AddressBook\Domain\Entity\AddressBookRecord;
use DateTimeImmutable;
use JsonSerializable;

class AddressBookRecordDTO implements JsonSerializable
{
    public function __construct(
        public readonly string $name,
        public readonly string $telephone,
        public readonly DateTimeImmutable $birthday,
        public readonly string $address,
    )
    {
    }

    public static function fromEntity(AddressBookRecord $addressBookRecord): self
    {
        return new self(
            $addressBookRecord->getName(),
            $addressBookRecord->getTelephone(),
            $addressBookRecord->getBirthday(),
            $addressBookRecord->getAddress(),
        );
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}