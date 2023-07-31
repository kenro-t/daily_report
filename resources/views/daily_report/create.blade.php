<h1>日報登録画面</h1>
<h3>{{ $date }} 日</h3>

{{-- withメソッドでここに入れてくる --}}
{{ session('flash_message') }}

<form action="{{ route('daily_report.store', ['date' => $date]) }}" method="post">
    @csrf
    {{-- old('name')でwithInputの値が取れる 第２引数を設定することでoldの値が存在しない場合の値をセットできる --}}
    案件名<input type="text" name='project_title' value="{{ old('project_title', 'デフォルト名') }}"><br>
    内容<textarea name="detail" id="" cols="30" rows="10">{{ old('detail') }}</textarea><br>
    <input type="submit" value='提出する'>
</form>