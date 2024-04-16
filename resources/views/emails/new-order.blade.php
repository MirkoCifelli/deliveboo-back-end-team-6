@extends('layouts.email-template')

@section('email')  @endsection

@section('content')

<section>
    <div class="container">
        <div class="top">
            <h1>
                Hai ricevuto un nuovo ordine!
            </h1>
            </div>
            <div class="bottom">
                <span>
                    {{$order->customer_name}} ha ordinato
                </span>
                
                <ul>
                    @foreach ($orderDishes as $dish)   
                    <li>
                        <div>
                          <span>
                                {{$dish['name']}} 
                            </span>
                            <span>
                                X {{$dish['quantity']}} 
                            </span>
                        </div>
                        <div>
                            {{$dish['price']}}€
                        </div>
                    </li>
                    @endforeach  
                </ul>

                <div class="final-price">
                    <span>
                        Per un totale di {{$order->customer_total_price}}€
                    </span>
                </div>
            </div>
        </div> 
    </section>

@endsection