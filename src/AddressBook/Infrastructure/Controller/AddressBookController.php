<?php

declare(strict_types=1);

namespace App\AddressBook\Infrastructure\Controller;

use App\AddressBook\Application\DTO\AddressBookMutateDTO;
use App\AddressBook\Application\DTO\AddressBookRecordDTO;
use App\AddressBook\Application\Service\AddressBookManagerService;
use App\AddressBook\Domain\Entity\AddressBookRecord;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class AddressBookController
{
    public function __construct(
        private readonly AddressBookManagerService $addressBookManager,
        private readonly SerializerInterface $serializer
    ) {
    }

    #[Route('/address-book', methods: ['GET'])]
    public function list(): Response
    {
        return new JsonResponse(
            $this->addressBookManager->list()
        );
    }

    // Редактирование
    #[Route('/address-book/{id}', methods: ['PUT'])]
    public function edit(AddressBookRecord $addressBookRecord, Request $request): Response
    {
        /** @var AddressBookMutateDTO $mutateDTO */
        $mutateDTO = $this->serializer->deserialize(
                $request->getContent(),
                AddressBookMutateDTO::class,
                'json'
            );
        $this->addressBookManager->edit($addressBookRecord, $mutateDTO);
        return new JsonResponse(
            AddressBookRecordDTO::fromEntity($addressBookRecord)
        );
    }
}