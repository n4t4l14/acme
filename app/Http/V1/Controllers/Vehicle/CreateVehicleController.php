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
            $vehicle = $this->createVehicleUseCase->create(
                $request->get('plate'),
                $request->get('color'),
                $request->get('brand'),
                $request->get('type'),
                $request->get('driver_id'),
                $request->get('owner_id')
            );

            return response()->json([
                'data' => $vehicle->toArray()
            ]);
        } catch (CreateVehicleException $exception) {
            return $this->responseCustomError($exception);
        }  catch (Throwable $exception) {
            return $this->responseGeneralError($exception);
        }
    }
}
