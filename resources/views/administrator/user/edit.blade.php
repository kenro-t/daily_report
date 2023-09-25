@extends('layouts.administrator_parent')
@section('administrator_content') 
    <main class="p-6">
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">ユーザー編集</h2>
            <form class="space-y-4">
                <div class="">
                    <div class="flex-grow">
                        <label for="name" class="block text-sm font-medium text-gray-700">名前</label>
                        <input type="text" id="name" name="name" class="mt-1 p-2 border rounded-md w-full">
                    </div>
                    <div class="flex-grow">
                        <label for="email" class="block text-sm font-medium text-gray-700">メールアドレス</label>
                        <input type="email" id="email" name="email" class="mt-1 p-2 border rounded-md w-full">
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">保存</button>
                    <a href="#" class="btn btn-secondary">キャンセル</a>
                </div>
            </form>
        </div>
    </main>
@endsection
