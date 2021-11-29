<?php

use App\Http\V1\Controllers\Person\CreatePersonController;
use App\Http\V1\Controllers\Vehicle\CreateVehicleController;
use App\Http\V1\Controllers\Vehicle\GetVehiclesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'vehicle'], function () {
    Route::post('/', [
        'as' => 'api.v1.vehicle.post',
        'uses' => CreateVehicleController::class
    ]);

    Route::get('report', [
        'as' => 'api.v1.vehicle.report',
        'uses' => GetVehiclesController::class
    ]);
});

Route::group(['prefix' => 'person'], function () {
    Route::post('/', [
        'as' => 'api.v1.person.post',
        'uses' => CreatePersonController::class
    ]);
});
