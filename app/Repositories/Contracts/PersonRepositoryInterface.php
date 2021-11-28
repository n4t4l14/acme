<?php

namespace App\Repositories\Contracts;

use App\Models\Person;

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
}
