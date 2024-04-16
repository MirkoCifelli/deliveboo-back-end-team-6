<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page-title') | Deliveboo</title> 
        {{-- config('app.name', 'Benvenuto') --}}

        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <section class="guest-layout">
            <main class="py-4">
                <div class="myContainer">
                    <ul>
                        <li>
                            <a class="link border-end-0" href="{{ route('login') }}">Login</a>
                        </li>
                        <li>
                            <a class="link" href="{{ route('register') }}">Register</a>
                        </li>
                    </ul>
                    @yield('main-content')
                </div>
            </main>
        </section>
    </body>
</html>
