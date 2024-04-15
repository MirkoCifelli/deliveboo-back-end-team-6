
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
                                Esci
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

                        <div>
                            <label for="company_name">
                                Nome del tuo ristorante <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="company_name" name="company_name" placeholder="inserisci il nome del tuo ristorante..." maxlength="128" required value="{{ old ('company_name')}}">
                        </div>

                        <div>
                            <label for="address">
                                Indirizzo <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="address" name="address" placeholder="inserisci il tuo indirizzo..." maxlength="128" required value="{{ old ('address')}}">
                        </div>

                        <div>
                            <label for="vat_number">
                                Partita IVA <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="vat_number" name="vat_number" placeholder="inserisci la tua partita iva..." maxlength="11" value="{{ old ('vat_number')}}">
                        </div>

                        <div>
                            <label for="img">
                                Immagine Ristorante
                            </label>
                            <input type="file" id="img" name="img">
                        </div>

                        <div>
                            <label for="typology_id">Scegli una o più tipologie di cucina <span class="text-danger">*</span></label>
                            <div class="checkboxes">
                                @foreach ($typologies as $typology)
                                    <label class="check-label" for="typology-{{ $typology->id }}">{{ $typology->name }}</label> 
                                    <input
                                        @if (old('typology') != null && in_array($typology->id, old('typologies')))
                                            checked
                                        @endif
                                        type="checkbox"
                                        id="typology-{{ $typology->id }}"
                                        name="typologies[]"
                                        value="{{ $typology->id }}">
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <button type="submit">
                                Aggiungi il mio ristorante
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </section>
    </body>
</html>