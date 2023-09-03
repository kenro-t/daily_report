<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\User;
use DateTimeImmutable;

class DailyReportController extends Controller
{
    //
    public function index () {
        return view('administrator.daily_report.index');
    }

    public function weekly_templete (Request $request) {

        $user = User::with('dailyReports.dailyReportDetails')->first();

        foreach ($user->dailyReports as $report) {
            foreach ($report->dailyReportDetails as $detail) {
                var_dump($detail->detail);
            }
        }

        // 1週間の日付の配列を作成する
        $date = new DateTimeImmutable($request->query('date'));
        $chosenWeek = [];
        $daysInAWeek = 7;
        for ($i=0; $i < $daysInAWeek; $i++) {
            $addedDay = $i +1;
            $chosenWeek[] = $date->modify("+$addedDay day")->format('Y/m/d');
        }
        // 非同期通信の場合
        if ($request->ajax()) {
            // weeklyビューに指定の1週間を渡して、renderする
            $data = ['chosenWeek' => $chosenWeek];
            $view = View::make('administrator.daily_report.partials.weekly', $data)->render();

            return response()->json(['html' => $view]);
        }

        // 非同期でない場合はエラーを返す処理
        // ...ここに処理を記入
    }
}
