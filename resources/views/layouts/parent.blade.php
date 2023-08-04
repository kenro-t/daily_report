{{-- <!DOCTYPE html> --}}
<html lang="{{ app()->getLocale() }}">
    <head>
        @component('layouts.head')
        @endcomponent
    </head>
    <body>
        <header class="bg-yellow-300 h-10 leading-10 font-bold text-xl">
            @component('layouts.header')
            @endcomponent
        </header>
        <div class="container">
            @yield('content')
        </div>
        <footer>
            @component('layouts.footer')
            @endcomponent
        </footer>
    </body>
</html>