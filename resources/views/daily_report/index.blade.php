<h1>日報カレンダー一覧</h1>


<div class='daily_report_list'>
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

<!-- FullCalenderの導入　後でMixに移行する -->
<div id='calendar' style='max-width:800px; margin:0 auto;'></div>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

<script>
    let target = `{{ route('daily_report.edit',['date'=>'target']) }}`;
    document.addEventListener('DOMContentLoaded', ()=> {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            dateClick: (e)=> {
                target = target.replace(/(target)/g,e.dateStr)
                window.location.href = target;
            }
        });
        calendar.render();
    });
</script>