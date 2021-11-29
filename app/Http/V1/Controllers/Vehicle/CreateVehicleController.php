<?php

namespace App\Http\V1\Controllers\Vehicle;

use App\Exceptions\CreateVehicleException;
use App\Http\V1\Controllers\ApiV1Controller;
use App\Http\V1\Requests\CreateVehicleFormRequest;
use App\UseCases\CreateVehicleUseCase;
use Illuminate\Http\JsonResponse;
use Throwable;

/**
 * Class CreateVehicleController
 * @package App\Http\V1\Controllers\Vehicle
 */
class CreateVehicleController extends ApiV1Controller
{
    /**
     * @var CreateVehicleUseCase
     */
    private $createVehicleUseCase;

    /**
     * @param CreateVehicleUseCase $createVehicleUseCase
     */
    public function __construct(CreateVehicleUseCase $createVehicleUseCase)
    {
        $this->createVehicleUseCase = $createVehicleUseCase;
    }

    /**
     * @param CreateVehicleFormRequest $request
     * @return JsonResponse
     */
    public function __invoke(CreateVehicleFormRequest $request): JsonResponse
    {
        try {
            $data = $request->get('data')['attributes'];
            $vehicle = $this->createVehicleUseCase->create(
                $data['plate'],
                $data['color'],
                $data['brand'],
                $data['type'],
                $data['driver_id'],
                $data['owner_id'],
            );

            return response()->json([
                'data' => [
                    'type' => 'person',
                    'id' => (string)$vehicle->id,
                    'attributes' => [
                        'plate' => $vehicle->plate,
                        'color' => $vehicle->color,
                        'brand' => $vehicle->brand,
                        'type' => $vehicle->type,
                        'driver_id' => $vehicle->driver_id,
                        'owner_id' => $vehicle->owner_id,
                        'created_at' => $vehicle->created_at,
                        'updated_at' => $vehicle->updated_at,
                    ]
                ]
            ]);
        } catch (CreateVehicleException $exception) {
            return $this->responseCustomError($exception);
        } catch (Throwable $exception) {
            return $this->responseGeneralError($exception);
        }
    }
}
