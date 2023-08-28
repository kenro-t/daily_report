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
        <div id='calendar' style='max-width:800px; margin:0 auto;'></div>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
        
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', ()=> {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'resourceTimeline',
        });
        calendar.render();
    });
    </script>
    <footer class="bg-white py-4 mt-8 shadow-md md:absolute md:bottom-0 md:w-full">
        <div class="container mx-auto text-center text-gray-600">
            &copy; 2023 まるまるまる. All rights reserved.
        </div>
    </footer>
</body>
</html>
