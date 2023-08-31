@extends('layouts.administrator_parent')
@section('administrator_content')
    <main class="p-6">
        <div id='calendar' style='max-width:800px; margin:0 auto;'></div>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
        
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', ()=> {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
        });
        calendar.render();
    });
    </script>
@endsection