<?php

namespace App\Http\V1\Controllers\Vehicle;

use App\Http\V1\Controllers\ApiV1Controller;

/**
 * Class CreateVehicleController
 * @package App\Http\V1\Controllers\Vehicle
 */
class CreateVehicleController extends ApiV1Controller
{
    public function __invoke()
    {
        return 'holi desde controlador de creacion de vehiculo';
    }
}
