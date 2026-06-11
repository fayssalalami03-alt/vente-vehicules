<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profil</title>

    @vite('resources/js/app.js')

    <style>
        body {
            background: #f4f6f9;
        }

        .profile-header {
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            color: white;
            padding: 30px;
            border-radius: 12px;
        }

        .card {
            border: none;
            border-radius: 12px;
        }
    </style>
</head>

<body>

    <div class="container py-4">


        <div class="profile-header mb-4 p-4 shadow-sm rounded-3 d-flex justify-content-between align-items-center"
            style="background: linear-gradient(135deg, #4e54c8, #8f94fb); color: white;">

            
            <div>
                <h3 class="mb-1 fw-bold">{{ Auth::user()->name }}</h3>

                <p class="mb-1 opacity-75">
                    📧 <strong>{{ Auth::user()->email }} </strong>
                </p>

                <p class="mb-0 opacity-75">
                    📱 <strong>{{ Auth::user()->phone }} </strong> 
                </p>
            </div>

            
            <div class="text-end">

                
                <div class="mb-2">
                    <span class="badge bg-dark px-3 py-2">
                        {{ Auth::user()->role }}
                    </span>
                </div>

                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger btn-sm fw-bold">
                        Logout
                    </button>
                </form>

            </div>

        </div>

        <div class="row text-center mb-4">

            <div class="col-md-4 d-flex">
                <div class="card p-3 shadow-sm w-100">
                    <h3>{{ $annoncesCount }}</h3>
                    <p>Mes annonces</p>
                </div>
            </div>

            <div class="col-md-4 d-flex">
                <div class="card p-3 shadow-sm w-100">
                    <h3>{{ $ToutAnonnce }}</h3>
                    <p>Liste des annonces</p>
                    <a href="{{ route('annonces.index') }}" class="btn btn-secondary mt-2">
                        Accéder
                    </a>
                </div>
            </div>

            <div class="col-md-4 d-flex">
                <div class="card p-3 shadow-sm w-100">
                    <p>Mes messages</p>
                    <a href="{{ route('message.inbox') }}" class="btn btn-info mt-5">
                        Ouvrir messages
                    </a>
                </div>
            </div>

        </div>


        <h4 class="mb-3">Mes annonces</h4>

        <div class="row">

            @foreach($annonces as $annonce)

                    <div class="col-md-4 mb-3">

                        <div class="card shadow-sm h-100">

                            <img src="{{ $annonce->images->first()
                ? asset('storage/' . $annonce->images->first()->image_path)
                : 'https://via.placeholder.com/300' }}" class="card-img-top" style="height:200px; object-fit:cover;">

                            <div class="card-body">

                                <h5>{{ $annonce->title }}</h5>

                                <p>{{ $annonce->marque }} - {{ $annonce->modele }}</p>

                                <p class="text-success fw-bold">
                                    {{ $annonce->prix }} DH
                                </p>

                                <div class="d-flex justify-content-between">

                                    <a href="{{ route('annonces.show', $annonce->id) }}" class="btn btn-dark btn-sm">
                                        Voir
                                    </a>

                                    <a href="{{ route('annonces.edit', $annonce->id) }}" class="btn btn-warning btn-sm">
                                        Modifier
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

            @endforeach

        </div>

    </div>

</body>

</html>