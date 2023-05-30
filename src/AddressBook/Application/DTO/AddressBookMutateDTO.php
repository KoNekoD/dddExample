<?php

declare(strict_types=1);

namespace App\AddressBook\Application\DTO;

use DateTimeImmutable;

class AddressBookMutateDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $telephone,
        public readonly DateTimeImmutable $birthday,
        public readonly string $address,
    )
    {
    }
}