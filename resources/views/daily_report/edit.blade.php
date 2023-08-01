<h1>日報登録画面</h1>
<h3>{{ $date }} 日</h3>

{{-- withメソッドでここに入れてくる --}}
{{ session('flash_message') }}

<form action="{{ route('daily_report.update', ['date' => $date]) }}" method="post">
    @csrf
    @foreach ($daily_report->dailyReportDetails as $dailyReportDetail)
        案件名<input type="text" name='project_title' value="{{ old('project_title', $dailyReportDetail->project_title) }}"><br>
        内容<textarea name="detail" id="" cols="30" rows="10">{{ old('detail',$dailyReportDetail->detail) }}</textarea><br>    
    @endforeach
    <input type="submit" value='更新する'>
</form>