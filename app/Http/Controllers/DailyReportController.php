<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyReport;

class DailyReportController extends Controller
{
    // index
    public function index() {
        $daily_reports = DailyReport::with('dailyReportDetails')->get();
        // dd($daily_reports);
        return view('daily_report.index', ['daily_reports' => $daily_reports]);
    }
}
