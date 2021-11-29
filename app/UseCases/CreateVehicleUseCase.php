<?php

namespace App\UseCases;

use App\Exceptions\CreateVehicleException;
use App\Models\Vehicle;
use App\Repositories\Contracts\VehicleRepositoryInterface;

class CreateVehicleUseCase
{
    /**
     * @var VehicleRepositoryInterface
     */
    private $vehicleRepository;


    /**
     * @param VehicleRepositoryInterface $vehicleRepository
     */
    public function __construct(VehicleRepositoryInterface $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    /**
     * @param string $plate
     * @param string $color
     * @param string $brand
     * @param string $type
     * @param string $driver_id
     * @param string $owner_id
     * @return Vehicle
     * @throws CreateVehicleException
     */
    public function create(
        string $plate,
        string $color,
        string $brand,
        string $type,
        string $driver_id,
        string $owner_id
    ) {
        $vehicle = new Vehicle();
        $vehicle->plate = $plate;
        $vehicle->color = $color;
        $vehicle->brand = $brand;
        $vehicle->type = $type;
        $vehicle->driver_id = $driver_id;
        $vehicle->owner_id = $owner_id;

        $existVehicle = $this->vehicleRepository->findByPlate($vehicle->plate);
        if (!empty($existVehicle)) {
            throw new CreateVehicleException('Este vehículo ya existe!');
        }

        return $this->vehicleRepository->create($vehicle);
    }
}
