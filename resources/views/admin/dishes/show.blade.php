@extends('layouts.app')

@section('page-title', 'Dishes Show')

@section('main-content')
    <section class="dishes-show">
        <div class="row g-0">
            <div class="col d-flex justify-content-center">
                <div class="my-card">
                    <div class="my-card-body">

                        @foreach ($errors->all() as $error)
                            <div class="warning error">
                                {{ $error }}
                            </div>
                        @endforeach

                        <h1 class="text-center mb-5">
                            {{ $dish->name }}
                        </h1>

                        <p class="mb-3">
                            {{ $dish->description }}
                        </p>

                       
                        <div>
                            <div class="cover_img">
                                @if ($dish->img != null && $dish->img != 'images/')  
                                    <img src="{{ asset('storage/' . $dish->img) }}">
                                @else
                                    <img src="{{ asset('storage/images/Logo/img-not-found.png') }}">
                                @endif
                            </div>
                        </div>
                        
            
                       

                        <div class="info">
                            Prezzo:
                            <span>
                                {{ $dish->price . '€' }}
                            </span>
                        </div>

                        @if ($dish->visible == true)
                            <span>
                                Disponibile
                            </span>
                        @else
                            <span>
                                Non disponibile
                            </span>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
