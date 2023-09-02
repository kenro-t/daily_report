@extends('layouts.administrator_parent')
@section('administrator_content')
    <main class="p-6">
        <div class="container mx-auto">
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <div class="flex justify-between mb-3">
                    <h1 class="text-2xl font-semibold mb-4">日報一覧</h1>
                    <div class="flex">
                        <a href="#" class="btn mr-3">前の週</a>
                        <a href="#" class="btn">次の週</a>
                    </div>
                </div>
                
                <!-- カレンダーの表を作成 -->
                <table class="table-fixed w-full">
                    <thead>
                        <tr>
                            <th class="w-1/7"></th>
                            <th class="w-1/7">日</th>
                            <th class="w-1/7">月</th>
                            <th class="w-1/7">火</th>
                            <th class="w-1/7">水</th>
                            <th class="w-1/7">木</th>
                            <th class="w-1/7">金</th>
                            <th class="w-1/7">土</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- ここに日付を挿入 -->
                            <td class="py-2">田中太郎</td>
                            <td class="py-2">1日</td>
                            <td class="py-2">2日</td>
                            <td class="py-2">3日</td>
                            <td class="py-2">4日</td>
                            <td class="py-2">5日</td>
                            <td class="py-2">6日</td>
                            <td class="py-2">7日</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script>
    </script>
@endsection