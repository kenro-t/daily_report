{{-- <!DOCTYPE html> --}}
<html lang="{{ app()->getLocale() }}">
    <head>
        @component('layouts.head')
        @endcomponent
    </head>
    <body>
        <header>
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