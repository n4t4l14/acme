<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Repositories\Contracts\VehicleRepositoryInterface;
use Illuminate\Contracts\View\View;

/**
 * Class VehicleDetailsController
 * @package App\Http\Controllers
 */
class VehicleDetailsController
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
     * @param string $vehicleID
     * @return View
     */
    public function __invoke(string $vehicleID): View
    {
        $vehicleActivated = 'active';
        $vehicle = $this->vehicleRepository->find($vehicleID);
        $data = compact('vehicleActivated', 'vehicle');
        return view('classic.pages.vehicleDetails', $data);
    }
}
