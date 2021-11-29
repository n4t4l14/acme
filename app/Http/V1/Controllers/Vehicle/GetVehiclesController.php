<?php

namespace App\Http\V1\Controllers\Vehicle;

use App\Http\V1\Controllers\ApiV1Controller;
use App\Repositories\Contracts\VehicleRepositoryInterface;

/**
 * Class GetVehiclesController
 * @package App\Http\V1\Controllers\Vehicle
 */
class GetVehiclesController extends ApiV1Controller
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

    public function __invoke()
    {
        return
    }

}
