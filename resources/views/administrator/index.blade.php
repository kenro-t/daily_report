@extends('layouts.administrator_parent')

@section('administrator_content')
    <main class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">ユーザー管理</h2>
                <p class="text-gray-600">ユーザーの追加、編集などができます。</p>
                <!-- <p class="text-gray-600">ばつばつさん</p> -->
                <a href="{{ route('administrator.user.index') }}" class="btn float-right">表示</a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">日報管理</h2>
                <p class="text-gray-600">投稿された日報を確認・出力ができます。</p>
                <!-- <p class="text-gray-600">マル月マル日</p> -->
                <a href="{{ route('administrator.daily_report.index') }}" class="btn float-right">表示</a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">通知管理</h2>
                <ul class="space-y-2">
                    <p class="text-gray-600">通知の設定・管理ができます。</p>
                    <!-- <li><a href="#" class="text-blue-500 hover:underline">A</a></li> -->
                    <!-- <li><a href="#" class="text-blue-500 hover:underline">B</a></li> -->
                    <!-- <li><a href="#" class="text-blue-500 hover:underline">C</a></li> -->
                </ul>
                <a href="#" class="btn float-right">表示</a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">通知</h2>
                <ul class="space-y-2">
                    <li><a href="#" class="text-blue-500 hover:underline">A</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">B</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">C</a></li>
                </ul>
                <a href="#" class="btn float-right">すべて</a>
            </div>
        </div>
    </main>
@endsection
