<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日報システム</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.11.2/dist/full.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-500 to-purple-600 h-screen">
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
                <h2 class="text-xl font-semibold mb-4">ユーザー</h2>
                <p class="text-gray-600">まるまるさん</p>
                <p class="text-gray-600">ばつばつさん</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">日報</h2>
                <p class="text-gray-600">マル月マル日</p>
                <p class="text-gray-600">マル月マル日</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">通知</h2>
                <ul class="space-y-2">
                    <li><a href="#" class="text-blue-500 hover:underline">A</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">B</a></li>
                    <li><a href="#" class="text-blue-500 hover:underline">C</a></li>
                </ul>
            </div>
        </div>
    </main>
    
    <footer class="bg-white py-4 mt-8 shadow-md absolute bottom-0 w-full">
        <div class="container mx-auto text-center text-gray-600">
            &copy; 2023 まるまるまる. All rights reserved.
        </div>
    </footer>
</body>
</html>
