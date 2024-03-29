@extends('layouts.app')

@section('page-title', 'Menù')

@section('main-content')
    <section class="menu">
        <div class="img-container">
            
            <h1>
                {{ $restaurant->company_name }}
            </h1>
        </div>
        {{-- @dd($dishes) --}}
        <div class="mycontaineroverflow">
            @foreach ($dishes as $Singledish) 
                <div class="mycontainermenu">
                    <div class="cardmenu">
                        <div class="container_card_img">
                            <img src="" alt="">
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
                                        {{ $Singledish->price }} 
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
