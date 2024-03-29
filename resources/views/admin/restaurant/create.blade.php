
@section('page-title', 'Restaurants Create')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page-title') | {{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <section class="restaurant-create">
            <header>
                <div class="myContainer">
    
                    <div class="row justify-content-end g-0">
    
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
                    
                </div>
            </main>
        </section>
    </body>
</html>