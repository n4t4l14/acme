<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

/**
 * Class VehicleFormCreateController
 * @package App\Http\Controllers
 */
class VehicleFormCreateController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $vehicleActivated = 'active';
        $data = compact('vehicleActivated');
        return view('classic.pages.vehicleFormCreate', $data);
    }
}
