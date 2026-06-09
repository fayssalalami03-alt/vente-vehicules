<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Annonce</title>

    @vite('resources/js/app.js')

    <style>
        body {
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .card {
            width: 100%;
            max-width: 800px;
            background: rgba(255,255,255,0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            backdrop-filter: blur(10px);
        }

        .card-body {
            padding: 25px;
        }

        label {
            font-weight: bold;
        }

        .form-control, .form-select {
            border-radius: 8px;
        }

        button {
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="row justify-content-center align-items-center" style="min-height:100vh;">

        <div class="col-md-10">

            <div class="card border-0">

                <div class="card-body">

                    <h3 class="mb-4 text-center">
                        Ajouter une nouvelle annonce
                    </h3>

                    <form method="POST" action="{{ route('annonces.store') }}" enctype="multipart/form-data">
                        @csrf

                        
                        <div class="mb-3">
                            <label>Titre</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="row">

                            
                            <div class="col-md-6 mb-3">
                                <label>Marque</label>
                                <input type="text" name="marque" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Modèle</label>
                                <input type="text" name="modele" class="form-control" required>
                            </div>

                         
                            <div class="col-md-6 mb-3">
                                <label>Année</label>
                                <input type="number" name="annee" class="form-control" required>
                            </div>


                            <div class="col-md-6 mb-3">
                                <label>Prix (DH)</label>
                                <input type="number" name="prix" class="form-control" required>
                            </div>

                        </div>

                       
                        <div class="mb-3">
                            <label>Ville</label>
                            <input type="text" name="ville" class="form-control" required>
                        </div>


                        <div class="mb-3">
                            <label>Catégorie</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">-- Choisir --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                       
                        <div class="mb-3">
                            <label>Images</label>
                            <input type="file" name="images[]" class="form-control" multiple>
                        </div>

                     
                        <button class="btn btn-primary w-100">
                             Publier l'annonce
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>