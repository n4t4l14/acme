<?php

namespace App\Http\V1\Controllers\Vehicle;

use App\Http\V1\Controllers\ApiV1Controller;
use App\Models\Vehicle;
use App\Repositories\Contracts\VehicleRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Throwable;

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

    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        try {

            $register = $this->vehicleRepository->getVehiclesWithDriverAndOwner();
            $data = [
                'data' => []
            ];
            $register->each(function (Vehicle $vehicle) use (&$data) {
                $data['data'][] = [
                    'vehicle' => [
                        'id' => $vehicle->id,
                        'plate' => $vehicle->plate,
                        'brand' => $vehicle->brand,
                    ],
                    'driver' => [
                        'id' => $vehicle->driver_id,
                        'complete_name' => $vehicle->driver_complete_name,
                    ],
                    'owner' => [
                        'id' => $vehicle->driver_id,
                        'complete_name' => $vehicle->owner_complete_name,
                    ]
                ];
            });

            return response()->json($data);
        } catch (Throwable $exception) {
            return $this->responseGeneralError($exception);
        }
    }
}
