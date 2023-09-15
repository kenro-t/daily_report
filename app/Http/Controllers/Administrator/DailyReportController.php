<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\DailyReport;
use App\Models\DailyReportDetail;
use DateTimeImmutable;

class DailyReportController extends Controller
{
    //
    public function index () {
        return view('administrator.daily_report.index');
    }

    // 日報閲覧
    public function show (Request $request) {
        // 日報詳細を取得
        $dailyReportDetail = DailyReportDetail::find($request->input('report_detail_id'));
        // viewにjson形式でタイトルと詳細をレスポンス
        return response()->json([
            'project_title' => $dailyReportDetail->project_title,
            'detail' => $dailyReportDetail->detail,
        ]);
    }

    public function weekly_templete (Request $request) {

        $users = User::with('dailyReports.dailyReportDetails')->get();

        // 週間表示のため、ターゲットの週のみの配列を作成する
        $thisWeekReports = [];
        $userArray = [];
        $requestStartOfWeekDate = new DateTimeImmutable($request->query('date'));
        foreach ($users as $i => $user) {
            foreach ($user->dailyReports as $dailyReport) {
                $postedDate = new DateTimeImmutable($dailyReport->posted_date);
                // ターゲットの週との日数を比較する
                $interval = $requestStartOfWeekDate->diff($postedDate);
                // 日数の差が7以内
                if ($interval->y === 0 && $interval->m === 0 && $interval->d >= 0 && $interval->d <= 7) {
                    $thisWeekReports[] = $dailyReport;
                }
            }

            // 1週間の日付の配列を作成する
            $chosenWeek = [];
            $daysInAWeek = 7;
            for ($k=0; $k < $daysInAWeek; $k++) {
                $chosenWeek[$k]["date"] = $requestStartOfWeekDate->modify("+$k day")->format('Y-m-d');
                foreach ($thisWeekReports as $report) {
                    if ($report->posted_date === $chosenWeek[$k]["date"]) {
                        $chosenWeek[$k]["report"] = $report;
                    }
                }
            }
            $userArray[$i]['username'] = $user->name;
            $userArray[$i]['chosenWeek'] = $chosenWeek;
        }

        // 1週間の日付の配列を作成する
        $oneWeekDates = [];
        $daysInAWeek = 7;
        for ($i=0; $i < $daysInAWeek; $i++) {
            $oneWeekDates[$i] = $requestStartOfWeekDate->modify("+$i day")->format('Y-m-d');
        }

        // 非同期通信の場合
        if ($request->ajax()) {
            // weeklyビューに指定の1週間を渡して、renderする
            $data = [
                'oneWeekDates' => $oneWeekDates,
                'chosenWeekReports' => $userArray
            ];
            $view = View::make('administrator.daily_report.partials.weekly', $data)->render();

            return response()->json(['html' => $view]);
        }

        // 非同期でない場合はエラーを返す処理
        // ...ここに処理を記入
    }
}
