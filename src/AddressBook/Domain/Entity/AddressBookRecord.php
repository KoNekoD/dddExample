<?php

namespace App\AddressBook\Domain\Entity;

use App\AddressBook\Application\DTO\AddressBookMutateDTO;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class AddressBookRecord
{
    public function __construct(
        #[ORM\Id]
        #[ORM\GeneratedValue]
        #[ORM\Column]
        private ?int $id = null,
        #[ORM\Column(length: 255)]
        private ?string $name = null,
        #[ORM\Column(length: 255)]
        private ?string $telephone = null,
        #[ORM\Column]
        private ?DateTimeImmutable $birthday = null,
        #[ORM\Column(length: 255)]
        private ?string $address = null,
    )
    {
    }

    public function updateInformation(
        string $name,
        string $telephone,
        DateTimeImmutable $birthday,
        string $address
    ): void
    {
        $this->name = $name;
        $this->telephone = $telephone;
        $this->birthday = $birthday;
        $this->address = $address;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function getBirthday(): ?DateTimeImmutable
    {
        return $this->birthday;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }
}
