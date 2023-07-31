<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyReport;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DailyReportController extends Controller
{
    // index
    public function index() {
        $dailyReports = DailyReport::with('dailyReportDetails')->get();
        // dd($daily_reports);
        return view('daily_report.index', ['daily_reports' => json_encode($dailyReports, JSON_UNESCAPED_UNICODE)]);
    }

    // create
    public function create($date) {
        return view('daily_report.create',['date' => $date]);
    }

    // create
    public function store(Request $request, $date) {

        try{
            $dailyReport = DB::transaction(function () use ($date, $request) {
                // throw new \Exception('debug');

                $dailyReport = new DailyReport();
                // $dailyReportにオーバーライドしないとリレーション先の保存に差し障る
                $dailyReport = $dailyReport
                    ->create([
                        'user_id' => \Auth::user()->id,
                        'posted_date' => $date,
                    ]);
                // daily_report_detail更新用にrequestからonlyで欲しいPOSTデータのみを取得する
                $dailyReportRequest = $request
                    ->only(['project_title','detail']);
                
                // 挿入したdaily_reportの挿入後データからIDを抽出し配列に追加
                $dailyReportRequest += ['daily_report_id'=> $dailyReport->id];

                // daily_report_detailテーブルに挿入
                $dailyReport
                    ->dailyReportDetails()
                    ->create([
                        'project_title' => $request->project_title,
                        'detail' => $request->detail,
                        'start_time'=> '',
                        'end_time'=> ''
                    ]);
            });
            // 成功したらカレンダー画面へリダイレクト
            return redirect()->route('daily_report.index');
        }
        catch(\Exception $e){
            // withで一度限りのsessionメッセージが渡せる
            // withInputでPOSTされてきた値をそのままviewに戻すことができる（railsのrenderみたいな使い方ができる）
            return back()->with('flash_message', '提出に失敗しました')->withInput();
        }
    }

    public function edit($date) {
        $dailyReport = DailyReport::with('dailyReportDetails')
            ->where('posted_date', $date)
            ->where('user_id',\Auth::user()->id)
            ->first();

        return view('daily_report.create',['daily_report' => $dailyReport]);
    }
}
