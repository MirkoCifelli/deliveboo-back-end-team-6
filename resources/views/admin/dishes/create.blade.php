@extends('layouts.app')

@section('page-title', 'Dish Create')

@section('main-content')
    <section class="dish-create">
        <div class="img-container">

            <h1>
                Creazione Dish
            </h1>
        </div>

        <div class="row g-0">
            <div class="col col-sm-12">
                <form action="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="name" class="form-label">Nome Piatto</label>
                    <input type="text" class=" @error('name') is-invalid @enderror" id="name" name="name"
                        placeholder="Inserisci il nome del Dish" maxlength="120" value="{{ old('name') }}">
                    @error('name')
                        <div class="warning error">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="img" class="form-label">Immagine del piatto</label>
                    <input type="file" class=" @error('img') is-invalid @enderror" id="img" name="img"
                        placeholder="Inserisci un'immagine del piatto">
                    @error('img')
                        <div class="warning error">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="description" class="form-label">Descrizione</label>
                    <textarea type="text" class=" @error('description') is-invalid @enderror" id="description" name="description"
                        placeholder="Inserisci la descrizione del piatto" maxlength="4024" value="{{ old('description') }}" rows="4"
                        cols="50"></textarea>
                    @error('description')
                        <div class="warning error">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="price" class="form-label">Prezzo</label>
                    <input type="number" step="0.01" class="@error('price') is-invalid @enderror" id="price"
                        name="price" placeholder="Inserisci il prezzo del piatto" value="{{ old('price') }}" min:0>

                        <div class="warning error validation d-none">
                            <span>
                                Inserisci un valore valido
                            </span>
                        </div>
                    @error('price')
                        <div class="warning error">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="visible" class="form-label">Disponibile</label>
                    <input type="checkbox" id="visible" name="visible" value="1" class="visible-botton"
                        @if (old('visible')) checked @endif>
                    @error('visible')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="">
                            + Aggiungi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        
        let min_price = document.getElementById("price");
        let warning = document.querySelector(".validation");

        min_price.addEventListener("input", function(){ 

            if( min_price.value < 0){
                warning.classList.remove('d-none');
            }
            else{
                warning.classList.add('d-none');
            }
        });

    </script>
@endsection
