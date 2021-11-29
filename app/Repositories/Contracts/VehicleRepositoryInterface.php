<?php

namespace App\Repositories\Contracts;

use App\Models\Vehicle;

/**
 * Interface VehicleRepositoryInterface
 * @package App\Repositories\Contracts
 */
interface VehicleRepositoryInterface
{
    /**
     * @param Vehicle $vehicle
     * @return Vehicle
     */
    public function create(Vehicle $vehicle): Vehicle;

    /**
     * @param string $plate
     * @return Vehicle
     */
    public function findByPlate(string $plate): ?Vehicle;
}
