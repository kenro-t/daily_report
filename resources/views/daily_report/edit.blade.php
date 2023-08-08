
@extends('layouts.parent')
@section('content')


<div class="">
    <div class="flex">
        <div class="m-2">日報登録画面</div>
        <div class="m-2">{{ $date }} 日</div>
        @if (Request::routeIs('daily_report.edit'))
        <div>
            <a class="btn" id="delete_btn" href="javascript:void(0)">削除</a>
        </div>
        @endif
    </div>
    <div class="flash_message">
        {{-- withメソッドでここに入れてくる --}}
        {{ session('flash_message') }}
    </div>
</div>

@if (Request::routeIs('daily_report.edit'))
    <form name="delete_post" action="{{ route('daily_report.delete', ['daily_report_detail_id' => $daily_report->dailyReportDetailEdit->id]) }}" method="post">
        @csrf
    </form>
@endif

@if (Request::routeIs('daily_report.edit'))
    <form class="" action="{{ route('daily_report.update', ['daily_report_detail_id' => $daily_report->dailyReportDetailEdit->id]) }}" method="post">
@endif
@if (Request::routeIs('daily_report.create'))
<form action="{{ route('daily_report.store', ['date' => $date]) }}" method="post">
@endif
    @csrf
    <div class="">
        案件名<input type="text" name='project_title' 
        value=" {{(Request::routeIs('daily_report.edit')) ? old('project_title', $daily_report->dailyReportDetailEdit->project_title) : old('detail') }} ">
    </div>
    
    内容<textarea name="detail" id="" cols="30" rows="10">{{ Request::routeIs('daily_report.edit') ? old('detail', $daily_report->dailyReportDetailEdit->detail) : old('detail') }}</textarea><br>    
    <input class="btn bg-indigo-400" type="submit" value='更新する'>
</form>


    @if (Request::routeIs('daily_report.edit'))
        <script>
            document.getElementById('delete_btn').addEventListener('click', ()=> {
                if (window.confirm('投稿を削除します')) {
                    document.forms.delete_post.submit()
                }
            });
        </script>
    @endif
@endsection