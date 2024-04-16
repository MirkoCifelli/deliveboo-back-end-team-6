@extends('layouts.app')

@section('page-title', 'Menù')

{{-- @vite('resources/js/delete.js') --}}

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
        <div class="mycontaineroverflow">
            @if (session('dishDeleted'))
            <div class="container alert alert-danger">
                <div class="row justify-content-center text-center">
                    <div class="col-12 col-md-6">
                        {{session('dishDeleted')}}
                    </div>
                </div>
            </div>
                
            @endif

            @foreach ($dishes as $Singledish)
                
                <div>

                    <div id="exampleModal{{$Singledish->id}}" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Conferma Eliminazione</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Sicuro di voler eliminare questo piatto?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                    <form action="{{ route('admin.dishes.destroy', ['dish' => $Singledish->slug]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mycontainermenu">
                    <div class="cardmenu">
                        
                        <div class="container_card_img">
                            @if ($Singledish->img != null && $Singledish->img != 'images/')
                                <img src="{{ asset('storage/'.$Singledish->img) }}">
                            @else
                                <img src="{{ asset('storage/images/Logo/img-not-found.png') }}">
                            @endif
                        </div>

                        {{-- @dd($Singledish) --}}
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
                                    @else
                                        <h6>
                                            Disponibile
                                        </h6>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="button_container">
                            <div>
                                <button class="button show">
                                    <a href="{{ route('admin.dishes.show', ['dish' => $Singledish->slug]) }}">
                                        Show
                                    </a>
                                </button>
                            </div>
                            <div>
                                <button class="button edit">
                                    <a href="{{ route('admin.dishes.edit', ['dish' => $Singledish->slug]) }}">
                                        Edit
                                    </a>
                                </button>
                            </div>
                            <div>
                                <div>
                                    <button class="button delete" data-bs-toggle="modal" data-bs-target="#exampleModal{{$Singledish->id}}">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let deleteButtons = document.querySelectorAll('.my-delete');

            deleteButtons.forEach(singleButton => {
                singleButton.addEventListener('click', function() {
                    // Mostra il modale di conferma eliminazione
                    let modal = document.getElementById('confirmDeleteModal');
                    modal.classList.add('show');
                    modal.style.display = 'block';
                    modal.setAttribute('aria-modal', 'true');

                    // Ascolta il click sul pulsante di conferma eliminazione
                    let confirmButton = document.getElementById('confirmDeleteButton');
                    confirmButton.addEventListener('click', function confirmDeleteHandler() {
                        // Esegui qui la logica per eliminare il piatto
                        let dishSlug = singleButton.getAttribute('data-id');
                        console.log('Elimina il piatto con slug:', dishSlug);

                        // Chiudi il modale di conferma eliminazione
                        modal.classList.remove('show');
                        modal.style.display = 'none';
                        modal.setAttribute('aria-modal', 'false');

                        // Rimuovi l'ascoltatore dell'evento click per evitare duplicati
                        confirmButton.removeEventListener('click', confirmDeleteHandler);
                    });
                });
            });
        });

    </script>
@endsection
