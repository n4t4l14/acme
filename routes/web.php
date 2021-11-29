<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersonFormCreateController;
use App\Http\Controllers\VehicleFormCreateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'as' => 'web.dashboard',
    'uses' => DashboardController::class
]);

Route::get('vehicle', [
    'as' => 'web.vehicle.formCreate',
    'uses' => VehicleFormCreateController::class
]);

Route::get('person', [
    'as' => 'web.person.formCreate',
    'uses' => PersonFormCreateController::class
]);
