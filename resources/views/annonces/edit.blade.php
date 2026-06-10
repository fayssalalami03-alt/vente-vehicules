@extends('layouts.app')

@section('title', 'Modifier annonce')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card shadow border-0">

            <div class="card-body p-4">

                <h3 class="mb-4"> Modifier l'annonce</h3>

                <form method="POST" action="{{ route('annonces.update', $annonce->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    
                    <div class="mb-3">
                        <label>Titre</label>
                        <input type="text" name="title" class="form-control"
                               value="{{ old('title', $annonce->title) }}" required>
                    </div>

                    
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="4" required>{{ old('description', $annonce->description) }}</textarea>
                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Marque</label>
                            <input type="text" name="marque" class="form-control"
                                   value="{{ old('marque', $annonce->marque) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Modèle</label>
                            <input type="text" name="modele" class="form-control"
                                   value="{{ old('modele', $annonce->modele) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Année</label>
                            <input type="number" name="annee" placeholder="Annee de prrmiere travail en marocen" class="form-control"
                                   value="{{ old('annee', $annonce->annee) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Prix</label>
                            <input type="number" name="prix" class="form-control"
                                   value="{{ old('prix', $annonce->prix) }}" required>
                        </div>

                    </div>

                   
                    <div class="mb-3">
                        <label>Ville</label>
                        <input type="text" name="ville" class="form-control"
                               value="{{ old('ville', $annonce->ville) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Catégorie</label>
                        <select name="category_id" class="form-select" required>

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $annonce->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    
                    <div class="mb-3">
                        <label>Ajouter de nouvelles images</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>
                    

                    @if($annonce->images->count() > 0)
                        <div class="mb-3">
                            <label>Images actuelles</label>

                            <div class="d-flex flex-wrap gap-2 mt-2">
                                @foreach($annonce->images as $img)
                                    <img src="{{ asset('storage/'.$img->image) }}"
                                         width="100"
                                         height="80"
                                         style="object-fit:cover;"
                                         class="rounded border">
                                @endforeach
                            </div>
                        </div>
                    @endif

                   
                    <button type="submit" class="btn btn-success w-100">
                        Edite
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection