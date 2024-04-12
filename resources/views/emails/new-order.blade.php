@extends('layouts.email-template')

@section('email')  @endsection

@section('content')

    <section>

        <h1>
            {{$order->user_name}} ha effettuato un nuovo ordine!
        </h1>
                    {{-- {!! nl2br($contact->message) !!} --}}   
    </section>

@endsection