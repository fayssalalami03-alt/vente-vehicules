@extends('layouts.app')

@section('title', 'Show annonce')

@section('content')

<div class="row">

    {{-- IMAGE --}}
    <div class="col-md-6 mb-3">
        <div class="card shadow-sm border-0">

            @if($images->count() > 0)
                <img src="{{ asset('storage/' . $images->first()->image_path) }}"
                     class="img-fluid"
                     style="height:400px; object-fit:cover;">
            @else
                <img src="https://via.placeholder.com/500"
                     class="img-fluid"
                     style="height:400px; object-fit:cover;">
            @endif

        </div>

       
        <div class="mt-3 d-flex justify-content-center">
            {{ $images->links() }}
        </div>
    </div>

    
    <div class="col-md-6">

        <div class="card shadow-sm border-0 p-4">

            <h2>{{ $annonce->title }}</h2>
            <hr>

            <p><strong>Marque:</strong> {{ $annonce->marque }}</p>
            <p><strong>Modèle:</strong> {{ $annonce->modele }}</p>
            <p><strong>Année:</strong> {{ $annonce->annee }}</p>
            <p><strong>Ville:</strong> {{ $annonce->ville }}</p>

            <h4 class="text-success">
                Prix: {{ $annonce->prix }} DH
            </h4>

            <hr>

            <p>{{ $annonce->description }}</p>

            <hr>

            <p>
                <strong>Vendeur:</strong> {{ $annonce->user->name ?? 'Inconnu' }}
            </p>

            <p>
                <strong>Téléphone:</strong> {{ $annonce->user->phone ?? 'Inconnu' }}
            </p>

            <hr>

          
            @auth
                @if(Auth::id() !== $annonce->user_id)

                    <h5>Contacter le vendeur</h5>

                    <form method="POST" action="{{ route('message.store') }}">
                        @csrf

                        <input type="hidden" name="receiver_id" value="{{ $annonce->user_id }}">
                        <input type="hidden" name="annonce_id" value="{{ $annonce->id }}">

                        <textarea name="message"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Écrire votre message..."></textarea>

                        <button class="btn btn-primary mt-2">
                            Envoyer
                        </button>
                    </form>

                @else
                    <p class="text-muted">Ceci est votre annonce</p>
                @endif
            @endauth

            <a href="{{ route('annonces.index') }}" class="btn btn-secondary mt-3">
                Retour
            </a>

        </div>
    </div>

</div>

@endsection