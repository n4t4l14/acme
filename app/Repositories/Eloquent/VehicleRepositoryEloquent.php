<?php

namespace App\Repositories\Eloquent;

use App\Models\Vehicle;
use App\Repositories\Contracts\VehicleRepositoryInterface;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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
        $columns = [
            'id',
            'plate',
            'brand',
            'driver_id',
            DB::raw('(SELECT CONCAT(person.first_name, \' \', person.surnames) FROM person WHERE id = vehicle.driver_id) AS driver_complete_name'),
            'owner_id',
            DB::raw('(SELECT CONCAT(person.first_name, \' \', person.surnames) FROM person WHERE id = vehicle.owner_id) AS owner_complete_name'),
        ];
        $query = $this->vehicle->select($columns);

       return $query->get();
    }

    /**
     * @inheritDoc
     */
    public function find(string $vehicleID): Vehicle
    {
        $model = $this->vehicle->find($vehicleID);
        $model->load(['driver', 'owner']);
        return $model;
    }
}
