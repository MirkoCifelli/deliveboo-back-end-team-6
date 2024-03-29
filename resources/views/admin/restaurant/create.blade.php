
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

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ( $errors->all() as $error )
                            <li>{{ $error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('admin.restaurant.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="company_name" class="form-label">
                                Nome del tuo ristorante <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="inserisci il nome del tuo ristorante..." maxlength="128" required value="{{ old ('company_name')}}">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">
                                Indirizzo <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="inserisci il tuo indirizzo..." maxlength="128" required value="{{ old ('address')}}">
                        </div>

                        <div class="mb-3">
                            <label for="vat_number" class="form-label">
                                Partita IVA
                            </label>
                            <input type="text" class="form-control" id="vat_number" name="vat_number" placeholder="inserisci la tua partita iva..." maxlength="11" value="{{ old ('vat_number')}}">
                        </div>

                        <div class="mb-3">
                            <label for="img" class="form-label">
                                Immagine Ristorante
                            </label>
                            <input class="form-control" type="file" id="img" name="img">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-dark w-100">
                                Aggiungi il mio ristorante
                            </button>
                        </div>



                    </form>
                </div>
            </main>
        </section>
    </body>
</html>