@extends('layouts.app')

@section('page-title', 'Order')

@section('main-content')
    <section class="order-show">
        <div class="row g-0">
            <div class="col d-flex justify-content-center">
                <div class="my-card">
                    <div class="my-card-body">

                        @foreach ($errors->all() as $error)
                            <div class="error">
                                {{ $error }}
                            </div>
                        @endforeach

                        <h1 class="text-center mb-5">
                            Nome: {{ $order->customer_name }} {{ $order->customer_lastname }}
                        </h1>

                        <p class="mb-3">
                            Email: {{ $order->customer_email }}
                        </p>

                        <p class="mb-3">
                            Indirizzo: {{ $order->customer_address }}
                        </p>

                        <p class="mb-3">
                            Effettuato il: {{ $order->created_at }}
                        </p>
                        <div>
                            <ul>
                                @foreach ($order->dishes as $key => $singleDish)
                                    <li>
                                        <span>
                                            {{ 'x'.$singleDish->pivot->quantity}}
                                        </span>

                                        <span>
                                            {{$singleDish->name}}
                                        </span>

                                        <span>
                                            {{$singleDish->price . '€'}}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="info">
                            Prezzo:
                            <span>
                                {{ $order->customer_total_price . '€' }}
                            </span>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
