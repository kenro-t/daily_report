
@extends('layouts.parent')

@section('head')
    @component('layouts.head')
    @endcomponent
@endsection

@section('header')
    @component('layouts.header')
    @endcomponent
@endsection

@section('content')
    {{-- <h1>日報カレンダー一覧</h1> --}}
    <!-- FullCalenderの導入　後でMixに移行する -->
    <div id='calendar' style='max-width:800px; margin:0 auto;'></div>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

    <script>
        // 日報データをjsonで渡す
        const json_daily_reports = @json($daily_reports);
        const daily_reports = JSON.parse(json_daily_reports);
        const events = [];
        // 日報データの数だけループ
        for (const daily_report of daily_reports) {
            // その日に登録されたプロジェクトの数だけループ
            for (const daily_report_detail of daily_report.daily_report_details) {
                events.push({
                    id: daily_report.id,// ユニークID
                    start: daily_report.posted_date,// イベント開始日
                    end: "",// イベント終了日
                    title: daily_report_detail.project_title,// イベントのタイトル
                    description: daily_report_detail.detail,// イベントの詳細
                    backgroundColor: "red",// 背景色
                    borderColor: "red",// 枠線色
                    editable: true// イベント操作の可否
                })
            };

        }

        let create_target = `{{ route('daily_report.create',['date'=>'targetDate']) }}`;
        let edit_target = `{{ route('daily_report.edit',['date'=>'targetDate']) }}`;

        document.addEventListener('DOMContentLoaded', ()=> {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events:events,
                dateClick: (e)=> {
                    const changedTarget = create_target.replace('targetDate',e.dateStr)
                    window.location.href = changedTarget;
                },
                eventClick: (e)=>{// イベントのクリックイベント
                    const changedTarget = edit_target.replace('targetDate',e.event.startStr)
                    window.location.href = changedTarget;
                }
            });
            calendar.render();
        });
    </script>  
@endsection

@section('footer')
    @component('layouts.footer')
    @endcomponent
@endsection