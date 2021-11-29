<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\PersonRepositoryInterface;
use Illuminate\Contracts\View\View;

/**
 * Class VehicleFormCreateController
 * @package App\Http\Controllers
 */
class VehicleFormCreateController extends Controller
{
    /**
     * @var PersonRepositoryInterface
     */
    private $personRepository;

    /**
     * @param PersonRepositoryInterface $personRepository
     */
    public function __construct(PersonRepositoryInterface $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    /**
     * @return View
     */
    public function __invoke(): View
    {
        $vehicleActivated = 'active';
        $drivers = $this->personRepository->getDrivers();
        $owners = $this->personRepository->getOwners();

        $data = compact('vehicleActivated', 'drivers', 'owners');
        return view('classic.pages.vehicleFormCreate', $data);
    }
}
