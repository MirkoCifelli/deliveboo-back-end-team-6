<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page-title') | Deliveboo</title>

        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <header>
            <div class="myContainer">

                <div class="row justify-content-between  g-0">

                    <div class="logo-container">
                        <img src="{{ asset('storage/images/Logo/logo-back-end.png') }}">
                    </div>

                    <form class="col-auto p-0 text-center" method="POST" action="{{ route('logout') }}">
                        @csrf
        
                        <button type="submit" class="logout">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
                    
        </header>

        <main>
            <div class="myContainer">
                <div class="row g-0">
                    <aside class="col d-flex flex-column ">
                        <ul>
                            <li>
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
    
                            <li>
                                <a href="{{ route('admin.dishes.index') }}">Menù</a>
                            </li>
    
                            <li>
                                <a href="{{ route('admin.orders.index') }}">Ordini</a>
                            </li>
    
                            <li>
                                <a href="{{ route('admin.statistics') }}">Statistiche</a>
                            </li>
                        </ul>
                    </aside>
                    <div class="col-10 ms-md-4">
                        @yield('main-content')
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
