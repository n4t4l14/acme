<?php

namespace App\Repositories\Eloquent;

use App\Models\Person;
use App\Repositories\Contracts\PersonRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PersonRepositoryEloquent implements PersonRepositoryInterface
{
    /**
     * @var Person
     */
    private $person;

    /**
     * @param Person $person
     */
    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    /**
     * @inheritDoc
     */
    public function create(Person $person): Person
    {
        $person->save();
        return $person;
    }

    /**
     * @inheritDoc
     */
    public function getDrivers(): Collection
    {
        return $this->person->where('role', '=', 'Conductor')->get();
    }

    /**
     * @inheritDoc
     */
    public function getOwners(): Collection
    {
        return $this->person->where('role', '=', 'Propietario')->get();
    }
}
