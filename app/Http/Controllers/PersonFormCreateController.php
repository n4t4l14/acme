<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

/**
 * Class PersonFormCreateController
 * @package App\Http\Controllers
 */
class PersonFormCreateController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $personActivated = 'active';
        $data = compact('personActivated');
        return view('classic.pages.personFormCreate', $data);
    }
}
