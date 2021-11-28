<?php

namespace App\UseCases;

use App\Models\Person;
use App\Repositories\Contracts\PersonRepositoryInterface;

class CreatePersonUseCase
{
    /**
     * @var PersonRepositoryInterface
     */
    private $personRepository;

    /**
     * @param PersonRepositoryInterface $personRepository
     */
    public function __construct(PersonRepositoryInterface $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    /**
     * @param string $identificationNumber
     * @param string $firstName
     * @param string|null $secondName
     * @param string $surnames
     * @param string $address
     * @param string $phoneNumber
     * @param string $city
     * @param string $role
     * @return Person
     */
    public function create(
        string $identificationNumber,
        string $firstName,
        ?string $secondName,
        string $surnames,
        string $address,
        string $phoneNumber,
        string $city,
        string $role
    ) {
        $person = new Person();
        $person->identification_number = $identificationNumber;
        $person->first_name = $firstName;
        $person->second_name = $secondName;
        $person->surnames = $surnames;
        $person->address = $address;
        $person->phone_number = $phoneNumber;
        $person->city = $city;
        $person->role = $role;

        return $this->personRepository->create($person);
    }
}
