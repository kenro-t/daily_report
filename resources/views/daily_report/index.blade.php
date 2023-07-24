<h1>日報カレンダー一覧</h1>

<div class='chat_room_list'>
        <ul>
            @foreach($daily_reports as $daily_report)
                <li>
                    {{ $daily_report->posted_date }} <br>
                    @foreach($daily_report->dailyReportDetails as $dailyReportDetail)
                        作業名:{{ $dailyReportDetail->project_title }}
                        <br>
                        作業内容:{{ $dailyReportDetail->detail }}
                    @endforeach
                </li>
            @endforeach
        </ul>
</div>