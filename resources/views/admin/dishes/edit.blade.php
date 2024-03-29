@extends('layouts.app')

@section('page-title', 'Dishes Edit')

@section('main-content')
<section class="dish-edit">

    <div class="img-container">

        <h1>
            Modifica del piatto
        </h1>
    </div>

    <div class="row g-0">
        <div class="col col-sm-12">
            <form action="{{ route('admin.dishes.update', ['dish' => $dish->slug]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="name" class="form-label">Nome Piatto</label>
                <input  type="text" 
                        class=" @error('name') is-invalid @enderror" 
                        id="name" 
                        name="name"
                        placeholder="Inserisci il nome del Dish" 
                        maxlength="120" value="{{ old('name', $dish->name) }}">
                @error('name')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

                <label for="img" class="form-label">Immagine del piatto</label>
                <input  type="file" 
                        class=" @error('img') is-invalid @enderror" 
                        id="img" name="img"
                        placeholder="Inserisci un'immagine del piatto">
                
                @if ($dish->img != null)

                    <div class="delete-image">
                        <label for="delete_img">
                            Rimuovi immagine
                        </label>
                        <input type="checkbox" value="1" id="delete_img" name="delete_img">
                    </div>

                    @error('delete_img')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror

                    <h4>
                        Copertina attuale
                    </h4>
                    <div class="preview">
                        <img src="/storage/{{ $dish->img }}">
                    </div>
                @endif

                <label for="description" class="form-label">Descrizione</label>
                <textarea type="text" class="@error('description') is-invalid @enderror" id="description" name="description"
                placeholder="Inserisci la descrizione del piatto" maxlength="4024" rows="4" cols="50">{{ old('description', $dish->description) }}</textarea>
                @error('description')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

                <label for="price" class="form-label">Prezzo</label>
                <input type="number" step="0.01" class="@error('price') is-invalid @enderror" id="price"
                    name="price" placeholder="Inserisci il prezzo del piatto" value="{{ old('price', $dish->price) }}">
                @error('price')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

                <label for="visible" class="form-label">Disponibile</label>
                <input type="checkbox" id="visible" name="visible" value="1" class="visible-botton"
                    @if (old('visible', $dish->visible)) checked @endif>
                @error('visible')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

                <div class="d-flex justify-content-center">
                    <button type="submit" class="">
                        Aggiorna
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection