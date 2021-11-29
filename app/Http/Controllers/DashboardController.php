<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        $dashActivated = 'active';
        $data = compact('dashActivated');
        return view('classic.pages.generalDashboard', $data);
    }
}
