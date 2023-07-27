<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyReport;
// use Illuminate\Support\Facades\Auth;

class DailyReportController extends Controller
{
    // index
    public function index() {
        $daily_reports = DailyReport::with('dailyReportDetails')->get();
        // dd($daily_reports);
        return view('daily_report.index', ['daily_reports' => $daily_reports]);
    }

    // create
    public function create($date) {
        // dd(\Auth::user()->id);
        $dailyReport = DailyReport::with('dailyReportDetails')
            ->where('posted_date', $date)
            ->where('user_id',\Auth::user()->id)
            ->first();
            
        dd($dailyReport);
        return view('daily_report.create',['daily_report' => $dailyReport]);
    }
}
