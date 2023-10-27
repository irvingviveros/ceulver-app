<?php

namespace App\Playground;

use App\Http\Controllers\Controller;
use Infrastructure\Reports\MyReport;

class PlaygroundController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $report = new MyReport();
        $report->run();
        return view('playground.test', ["report"=>$report]);
    }
}
