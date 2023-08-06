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

        // 同日に既に投稿したdaily_report_idが存在すれば、そのIDを利用する
        // 存在しない場合は新規daily_report_idを発行する

        try{
            $dailyReport = DB::transaction(function () use ($date, $request) {
                // throw new \Exception('debug');

                // $dailyReportにオーバーライドしないとリレーション先の保存に差し障る
                $dailyReport = DailyReport::with('dailyReportDetails')
                    ->where('posted_date', $date)
                    ->where('user_id', \Auth::user()->id)
                    ->first();

                // daily_reportが存在しない場合に新規発行
                if(is_null($dailyReport)) {
                    $dailyReport = new DailyReport();
                    $dailyReport = $dailyReport
                        ->create([
                            'user_id' => \Auth::user()->id,
                            'posted_date' => $date,
                        ]);
                }

                // daily_report_detail更新用にrequestからonlyで欲しいPOSTデータのみを取得する
                $dailyReportRequest = $request
                    ->only(['project_title','detail']);
                
                // 挿入したdaily_reportの挿入後データからIDを抽出し配列に追加
                $dailyReportRequest += ['daily_report_id'=> $dailyReport->id];

                // daily_report_detailテーブルに挿入
                $dailyReport = $dailyReport
                    ->dailyReportDetails()
                    ->create($dailyReportRequest);
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

    public function edit($daily_report_detail_id) {
        // 日付とユーザーIDで該当の投稿を取得
        // withWhereHasを使う with＋wherehasだとリレーション先の絞り込み条件が指定されないので注意
        $dailyReport = DailyReport::withWhereHas('dailyReportDetailEdit', function ($query) use ($daily_report_detail_id) {
                $query->where('id', $daily_report_detail_id);
            })
            ->first();

            return view('daily_report.edit',[
            'date' => $dailyReport->posted_date,
            'daily_report' => $dailyReport
        ]);
    }

    public function update(Request $request, $date)
    {
        $dailyReport = DailyReport::with('dailyReportDetails')
            ->where('posted_date', $date)
            ->where('user_id',\Auth::user()->id)->first();
    
        // onlyメソッドでもっと簡単に渡せない？
        $dailyReport->dailyReportDetails()->update([
            "project_title" => $request->project_title,
            "detail" => $request->detail
        ]);
        
        if($dailyReport->save()) {
            return redirect()->route('daily_report.index');
        }
        else {
            return back()->with('flash_message', '提出に失敗しました')->withInput();
        }
    }
}
