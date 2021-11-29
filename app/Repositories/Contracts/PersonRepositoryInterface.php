<?php

namespace App\Repositories\Contracts;

use App\Models\Person;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface PersonRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface PersonRepositoryInterface
{
    /**
     * @param Person $person
     * @return Person
     */
    public function create(Person $person): Person;

    /**
     * @return Collection
     */
    public function getDrivers(): Collection;

    /**
     * @return Collection
     */
    public function getOwners(): Collection;
}
