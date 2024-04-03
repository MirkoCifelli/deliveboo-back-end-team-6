@extends('layouts.app')

@section('page-title', 'Tutti gli ordini')

@section('main-content')
<section class="ordini">
    <div class="img-container">
        <div class="container_top">
            <div>
                <h1>
                    Ordini
                </h1>
            </div>
        </div>
    </div>
    <div class="mycontaineroverflow">
        @foreach ($orders as $singleOrder)
            <div class="mycontainermenu">
                <div class="cardmenu">
                    <div class="containerJ left">
                        <ul>
                            <li>
                                <h2>
                                    {{ $singleOrder->customer_name }} {{$singleOrder->customer_lastname}}
                                </h2>
                            </li>
                            <li> 
                                <span>
                                    {{$singleOrder->customer_email}}
                                </span>
                            </li>
                            <li> 
                                <span class="price">
                                    {{$singleOrder->customer_total_price . '€'}}
                                </span>
                            </li>
                        </ul> 
                    </div>
                    <div class="containerJ right">
                        <ul>
                            <li>
                                <span>
                                    {{ $singleOrder->customer_address }}
                                </span>
                            </li>
                            <li>
                                <span>
                                    {{ 'Ordine effettuato il '.$singleOrder->created_at }}
                                </span>
                            </li>
                        </ul> 
                    </div>
                    <div class="button_container">
                        <div>
                            <div class="button show">
                                <a href="{{ route('admin.orders.show', ['order' => $singleOrder->id]) }}">
                                    Show
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection