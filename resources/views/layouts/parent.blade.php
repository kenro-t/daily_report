{{-- <!DOCTYPE html> --}}
<html lang="{{ app()->getLocale() }}">
<head>
    @yield('head')
</head>
    
<body>
    <header>
        @yield('header')
    </header>
    <div class="container">
        @yield('content')
    </div>
    </body>
    <footer>
        @yield('footer')
    </footer>
</html>