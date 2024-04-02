@extends('layouts.app')

@section('page-title', 'Menù')

@section('main-content')
    <section class="menu">
        <div class="img-container">
            <div class="container_top">
                <div>
                    <h1>
                        {{ $restaurant->company_name }}
                    </h1>
                </div>
                <div>
                    <button class="button add">
                        <a href="{{ route('admin.dishes.create') }}">
                            Aggiungi piatto
                        </a>
                    </button>
                </div>
            </div>
        </div>
        {{-- @dd($dishes) --}}
        <div class="mycontaineroverflow">
            @foreach ($dishes as $Singledish) 
                <div class="mycontainermenu">
                    <div class="cardmenu">
                        
                        <div class="container_card_img">
                            @if ($Singledish->img != null)
                                <img src="{{ asset('storage/'.$Singledish->img) }}">
                                
                            @else
                                <img src="{{ asset('storage/images/Logo/img-not-found.png') }}">
                            @endif
                        </div>
                        
                        
                        <div class="container_card_content">
                            <ul>
                                <li>
                                    <h2>
                                        {{ $Singledish->name }}
                                    </h2>
                                </li>
                                <li>
                                    <p>
                                        {{ $Singledish->description }}
                                    </p>
                                </li>
                                <li>
                                    <h5>
                                        {{ $Singledish->price.'€' }} 
                                    </h5>
                                </li>
                                <li> @if ($Singledish->visible != 1)
                                    <h6>
                                        Non Disponibile 
                                    </h6>
                                    @endif
                                    <h6>
                                        Disponibile
                                    </h6>
                                </li>
                            </ul>
                        </div>
                        <div class="button_container">
                            <div>
                                <button class="button">
                                    <a href="{{ route('admin.dishes.show', ['dish' => $Singledish->slug]) }}">
                                        Show
                                    </a>
                                </button>
                            </div>
                            <div>
                                <button class="button">
                                    <a href="{{ route('admin.dishes.edit', ['dish' => $Singledish->slug]) }}">
                                        Edit
                                    </a>
                                </button>
                            </div>
                            <div>
                                <button class="button">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
