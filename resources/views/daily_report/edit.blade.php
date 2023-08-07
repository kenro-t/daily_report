
@extends('layouts.parent')
@section('content')
<h1>日報登録画面</h1>
<h3>{{ $date }} 日</h3>

{{-- withメソッドでここに入れてくる --}}
{{ session('flash_message') }}

<a class="btn" id="delete_btn" href="javascript:void(0)">削除</a>
<form name="delete_post" action="{{ route('daily_report.delete', ['daily_report_detail_id' => $daily_report->dailyReportDetailEdit->id]) }}" method="post">
    @csrf
</form>

<form action="{{ route('daily_report.update', ['daily_report_detail_id' => $daily_report->dailyReportDetailEdit->id]) }}" method="post">
    @csrf
    案件名<input type="text" name='project_title' value="{{ old('project_title', $daily_report->dailyReportDetailEdit->project_title) }}"><br>
    内容<textarea name="detail" id="" cols="30" rows="10">{{ old('detail',$daily_report->dailyReportDetailEdit->detail) }}</textarea><br>    
    <input class="btn" type="submit" value='更新する'>
</form>

<script>
    
    document.getElementById('delete_btn').addEventListener('click', ()=> {
        if (window.confirm('投稿を削除します')) {
            document.forms.delete_post.submit()
        }
    });
</script>
@endsection