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
    
    <footer class="bg-white py-4 mt-8 shadow-md md:absolute md:bottom-0 md:w-full">
        <div class="container mx-auto text-center text-gray-600">
            &copy; 2023 ユーザー管理画面. All rights reserved.
        </div>
    </footer>
</body>
</html>
