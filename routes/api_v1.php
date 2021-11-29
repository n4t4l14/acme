<?php

use App\Http\V1\Controllers\Person\CreatePersonController;
use App\Http\V1\Controllers\Vehicle\CreateVehicleController;
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
    Route::get('/{vehicle_id}', [
        'as' => 'api.v1.vehicle.get',
        'uses' => function () {
            echo 'hola mundo desde get';
        }
    ])->where('vehicle_id', '[0-9]+');;

    Route::post('/', [
        'as' => 'api.v1.vehicle.post',
        'uses' => CreateVehicleController::class
    ]);

    Route::get('report', [
        'as' => 'api.v1.vehicle.report',
        'uses' => function () {
            return '{"data":[{"vehicle":{"id":"1","plate":"JNW789","brand":"RENOLT"},"driver":{"id":"1","complete_name":"MIGUEL CASTAÑEDA"},"owner":{"id":"2","complete_name":"JULIETH CASTRO"}},{"vehicle":{"id":"2","plate":"TYI782","brand":"MAZDA"},"driver":{"id":"8","complete_name":"PABLO FERNANDO CASTRO PULIDO"},"owner":{"id":"2","complete_name":"ANGIE MEMELA XOXOXO"}}]}';
        }
    ]);
});

Route::group(['prefix' => 'person'], function () {
    Route::get('/', [
        'as' => 'api.v1.person.get',
        'uses' => function () {
            echo 'hola mundo desde get person';
        }
    ]);

    Route::post('/', [
        'as' => 'api.v1.person.post',
        'uses' => CreatePersonController::class
    ]);
});
