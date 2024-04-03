@extends('layouts.app')

@section('page-title', 'Home')

@section('main-content')

    <section class="dashboard">
        <div class="img-container">

            <h1>
                {{ $restaurant->company_name }}
            </h1>
        </div>

        <div class="row g-0">
            <div class="col-6">
                <ul class="restaurant-info">
                    <li>
                        <span>
                            Proprietario:
                        </span>
                        <span>
                            {{ $restaurant->user->name }}
                        </span>
                    </li>
                    <li>
                        <span>
                            Email del proprietario:
                        </span>
                        <span>
                            {{ $restaurant->user->email }}
                        </span>
                    </li>
                    <li>
                        <span>
                            Indirizzo:
                        </span>
                        <span>
                            {{ $restaurant->address }}
                        </span>
                    </li>
                    <li>
                        <span>
                            Partita IVA:
                        </span>
                        <span>
                            {{ $restaurant->vat_number }}
                        </span>
                    </li>
                </ul>

                <h2>
                    Menù
                </h2>

                <div class="restaurant-menu">
                    @foreach ($dishes as $singleDish)
                        <div class="dish">
                            <span>
                                {{ $singleDish->name }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if ($restaurant->img != null)
                const imageUrl = "{{ asset('storage/images/') }}" + "/{{ $restaurant->img }}";
            @else
                const imageUrl = "{{ asset('storage/images/Logo/img-not-found.png') }}";
            @endif

            document.querySelector('.img-container').style.backgroundImage = `url('${imageUrl}')`;
        });
    </script>
@endsection
