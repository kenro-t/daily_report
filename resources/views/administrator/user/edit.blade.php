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
            <h1 class="text-xl font-semibold text-gray-800">日報システムユーザー管理</h1>
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
    
    <footer class="bg-white py-4 mt-8 shadow-md md:absolute md:bottom-0 md:w-full">
        <div class="container mx-auto text-center text-gray-600">
            &copy; 2023 ユーザー管理画面. All rights reserved.
        </div>
    </footer>
</body>
</html>
