
<td></td>
@foreach ($oneWeekDates as $date)
    <td class="py-2 text-center">
        {{ $date }}
    </td>
@endforeach
<tr>
    @foreach ($chosenWeekReports as $chosenWeekReport)
        <td class="py-2">{{ $chosenWeekReport['username'] }}</td>
            @foreach ($chosenWeekReport['chosenWeek'] as $i => $day)
                <td class="py-2 text-center">
                    @isset($day['report'])
                        @foreach ($day['report']->dailyReportDetails as $dailyReportDetail)
                            <label for="report_modal" class="report_title" data-report_detail_id="{{$dailyReportDetail->id}}">
                                {{ $dailyReportDetail->project_title }}
                            </label>
                        @endforeach
                    @endisset
                </td>
            @endforeach
    @endforeach
</tr>