<h1>日報登録画面</h1>
<h3>{{ $date }} 日</h3>

{{-- withメソッドでここに入れてくる --}}
{{ session('flash_message') }}
@php
// dd($daily_report)
@endphp
<form action="{{ route('daily_report.update', ['date' => $date]) }}" method="post">
    @csrf
    案件名<input type="text" name='project_title' value="{{ old('project_title', $daily_report->dailyReportDetailEdit->project_title) }}"><br>
    内容<textarea name="detail" id="" cols="30" rows="10">{{ old('detail',$daily_report->dailyReportDetailEdit->detail) }}</textarea><br>    
    <input type="submit" value='更新する'>
</form>