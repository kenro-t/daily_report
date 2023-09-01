<body class="bg-gradient-to-br from-blue-500 to-purple-600 md:h-screen">
    <header class="bg-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800">日報システムダッシュボード</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('administrator.index') }}" class="text-gray-600 hover:text-gray-800">ホーム</a></li>
                    {{-- <li><a href="#" class="text-gray-600 hover:text-gray-800">設定</a></li> --}}
                    <li>
                        <form action="{{ route('administrator.logout') }}" class="mb-0" method="post">
                            @csrf
                            <input type="submit" class="text-gray-600 hover:text-gray-800" value="ログアウト">
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </header>