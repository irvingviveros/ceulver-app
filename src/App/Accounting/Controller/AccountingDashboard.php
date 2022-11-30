<?php
declare(strict_types = 1);

namespace App\Accounting\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountingDashboard extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        $breadcrumbs = [
            ['link' => 'home', 'name' => "Inicio"],
            ['link' => route('accounting.dashboard'), 'name' => "Coordinación académica"],
            ['name' => "Panel principal"]
        ];

        return view('modules.accounting.dashboard.index',
            ['breadcrumbs' => $breadcrumbs]);
    }
}
