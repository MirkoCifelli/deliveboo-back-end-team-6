@extends('layouts.app')

@section('page-title', 'Home')

@section('main-content')

    <section class="dashboard">
        <div class="img-container">

            <h1>
                {{ $restaurant->company_name }}
            </h1>

            <div id="img-edit" class="img-edit-button">
                <span id="edit-img-text">Cambia immagine</span>
                <form class="d-none" id="edit-img" action="{{ route('admin.restaurant.update', ['restaurant' => $restaurant->slug]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="custom-input">
                        <label for="img" class="custom-file-upload-button">Seleziona un'immagine</label>
                        <input id="img" name="img" type="file" accept="image/*">
                    </div>
                    
                    <button type="submit">
                        Aggiorna
                    </button>
                </form>
            </div>

        </div>

        <div class="row g-0">
            <div class="col-12 col-md-6">
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

                <h2 class="p-2">
                    Menù
                </h2>

                <div class="restaurant-menu p-2">
                    @foreach ($dishes as $singleDish)
                        <div class="dish">
                            <span>
                                {{ $singleDish->name }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6">
                <h3>
                    Le tipologie della tua cucina
                </h3>
                <div class="typologies">
                    @foreach ($restaurant->typologies as $typology)
                        <div class="single-typology">
                            <span>
                                {{ $typology->name }}
                            </span>
                        </div>
                    @endforeach
                </div>
                <div class="button-add-typology">
                    <span id="button-text">
                        Aggiungi tipologia
                    </span>

                    <form id="add-typology" class="d-none" action="{{ route('admin.restaurant.update', ['restaurant' => $restaurant->slug]) }}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        @method('PUT')

                        <div class="back">
                            <i class="fa-solid fa-chevron-left"></i>
                        </div>
                        <div class="checkboxes">
                            @foreach ($typologies as $typology)
                                <div class="singleTypology">
                                    
                                    <input
                                    @if ($restaurant->typologies->contains($typology->id))
                                        checked
                                    @endif
                                        type="checkbox"
                                        id="typology-{{ $typology->id }}"
                                        name="typologies[]"
                                        value="{{ $typology->id }}">
                                    <label class="check-label" for="typology-{{ $typology->id }}">{{ $typology->name }}</label> 
                                    
                                </div>
                            @endforeach
                        </div>

                        <button type="submit">
                            Aggiungi
                        </button>
                    </form>
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

        document.addEventListener('DOMContentLoaded', function() {
            let buttonTypology = document.querySelector('.button-add-typology');
            let form = document.getElementById('add-typology');
            let text = document.getElementById('button-text');
            let backButton = document.querySelector('.back');
            let imgEditButton = document.getElementById('img-edit');
            let formImg = document.getElementById('edit-img');
            let textImg = document.getElementById('edit-img-text');

            if (buttonTypology) {
                buttonTypology.addEventListener('click', function(){
                    if(!this.classList.contains('checkbox-container')){
                        
                        this.classList.remove('button-add-typology');
                        this.classList.add('checkbox-container');
                        text.classList.add('d-none');
                    }
                    
                    if(this.classList.contains('checkbox-container')){
                        
                        form.classList.remove('d-none');
                    }

                    console.log(buttonTypology.classList);
                    console.log(form.classList);
                });
            }

            if(backButton){
                backButton.addEventListener('click', function(event){
                    event.stopPropagation();

                    if(buttonTypology.classList.contains('checkbox-container')){
                        
                        buttonTypology.classList.add('button-add-typology');
                        buttonTypology.classList.remove('checkbox-container');
                        form.classList.add('d-none');
                        text.classList.remove('d-none');
                    }

                    console.log('ciao')
                })
            }

            if(imgEditButton){

                imgEditButton.addEventListener('click', function(){

                    if(!this.classList.contains('input-img')){
                        this.classList.add('input-img')
                        formImg.classList.remove('d-none')
                        textImg.classList.add('d-none')
                    }
                })

            }  

        });

    </script>
@endsection
