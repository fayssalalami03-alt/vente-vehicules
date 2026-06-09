@extends('layouts.app')

@section('title', 'Annonces')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Liste des Annonces</h2>
    

    @auth
        <a href="{{ route('annonces.create') }}" class="btn btn-primary">
            Ajouter une annonce
        </a>
    @endauth
</div>


@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="row">

@forelse($annonces as $annonce)

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 h-100">


            <img src="{{ $annonce->images->first()
                ? asset('storage/' . $annonce->images->first()->image_path)
                : 'https://via.placeholder.com/300' }}"
                class="card-img-top"
                style="height:200px; object-fit:cover;">

            <div class="card-body">

                <h5>{{ $annonce->title }}</h5>

                <p class="text-muted">
                    {{ $annonce->marque }} - {{ $annonce->modele }}
                </p>

                <p>Année: {{ $annonce->annee }}</p>

                <p class="fw-bold text-success">
                    {{ $annonce->prix }} DH
                </p>

                <p class="text-muted">
                    {{ $annonce->ville }}
                </p>
                <p class="fw-bold text-success">
                    {{ $annonce->category_id==2?"Motos":"Voiture" }}
                </p>


                <a href="{{ route('annonces.show', $annonce->id) }}"
                   class="btn btn-dark w-100 mb-2">
                    Voir détails
                </a>

       
                @auth
                @if(Auth::user()->role === 'admin' || $annonce->user_id === Auth::id())

                    <div class="dropdown">

                        <button class="btn btn-secondary btn-sm dropdown-toggle w-100"
                                data-bs-toggle="dropdown">
                            Actions
                        </button>

                        <ul class="dropdown-menu w-100">

                            <li>
                                <a class="dropdown-item"
                                   href="{{ route('annonces.edit', $annonce->id) }}">
                                     Modifier
                                </a>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form action="{{ route('annonces.destroy', $annonce->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Supprimer cette annonce ?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="dropdown-item text-danger">
                                         Supprimer
                                    </button>

                                </form>
                            </li>

                        </ul>
                    </div>

                @endif
                @endauth

            </div>
        </div>
    </div>

@empty

    <div class="col-12 text-center">
        <h4>Aucune annonce disponible</h4>
    </div>

@endforelse

</div>

@endsection