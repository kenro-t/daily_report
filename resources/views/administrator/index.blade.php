<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日報システム</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.0/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-gradient-to-br from-blue-500 to-purple-600 md:h-screen">
    <header class="bg-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800">日報システムダッシュボード</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="#" class="text-gray-600 hover:text-gray-800">ホーム</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-800">設定</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-800">ログアウト</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
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
    
    <footer class="bg-white py-4 mt-8 shadow-md md:absolute md:bottom-0 md:w-full">
        <div class="container mx-auto text-center text-gray-600">
            &copy; 2023 まるまるまる. All rights reserved.
        </div>
    </footer>
</body>
</html>
