<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    //
    public function index () {
        return view('administrator.daily_report.index');
    }
}
