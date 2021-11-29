<?php

namespace App\Repositories\Eloquent;

use App\Models\Vehicle;
use App\Repositories\Contracts\VehicleRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class VehicleRepositoryEloquent
 * @package App\Repositories\Eloquent
 */
class VehicleRepositoryEloquent implements VehicleRepositoryInterface
{
    /**
     * @var Vehicle
     */
    private $vehicle;

    /**
     * @param Vehicle $vehicle
     */
    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    /**
     * @inheritDoc
     */
    public function create(Vehicle $vehicle): Vehicle
    {
        $vehicle->save();
        return $vehicle;
    }

    /**
     * @inheritDoc
     */
    public function findByPlate(string $plate): ?Vehicle
    {
        return $this->vehicle->where('plate', '=', $plate)->first();
    }

    /**
     * @inheritDoc
     */
    public function getVehiclesWithDriverAndOwner(): Collection
    {
       return $this->vehicle->get();
    }
}
