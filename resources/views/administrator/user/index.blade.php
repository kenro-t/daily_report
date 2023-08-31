@extends('layouts.administrator_parent')
@section('administrator_content')
    <main class="p-6">
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">ユーザー一覧</h2>
            <div class="mb-4">
                <a href="#" class="btn btn-primary">新規追加</a>
            </div>
            <table class="w-full border">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">名前</th>
                        <th class="border px-4 py-2">メールアドレス</th>
                        <th class="border px-4 py-2">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-4 py-2">1</td>
                        <td class="border px-4 py-2">山田 太郎</td>
                        <td class="border px-4 py-2">yamada@example.com</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('administrator.user.edit') }}" class="btn btn-sm btn-primary">編集</a>
                            <button class="btn btn-sm btn-danger">削除</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">2</td>
                        <td class="border px-4 py-2">佐藤 次郎</td>
                        <td class="border px-4 py-2">sato@example.com</td>
                        <td class="border px-4 py-2">
                            <button class="btn btn-sm btn-primary">編集</button>
                            <button class="btn btn-sm btn-danger">削除</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection