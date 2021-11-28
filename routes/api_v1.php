<?php

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
    ]);

    Route::post('/', [
        'as' => 'api.v1.vehicle.post',
        'uses' => function () {
            echo 'hola mundo desde post';
        }
    ]);
});
