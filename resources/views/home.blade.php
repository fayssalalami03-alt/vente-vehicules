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
            padding: 40px;
            border-radius: 12px;
        }

        .card {
            border: none;
            border-radius: 12px;
        }

        .btn-chat {
            background: #25D366;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container py-4">

        <div class="profile-header mb-4">

            <h2> {{ Auth::user()->name }}</h2>
            <p>{{ Auth::user()->email }}</p>
            <p>{{ Auth::user()->phone }}</p>

        </div>


        <div class="row text-center mb-4">

            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <h3>{{ $annoncesCount }}</h3>
                    <p>Mes annonces</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <h3>{{ $messagesCount ?? 0 }}</h3>
                    <p>Messages</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <a href="{{ route('message.inbox') }}" class="btn btn-info">
                        Mes messages
                    </a>
                    <a href="{{ route('annonces.index') }}" class="btn btn-secondary">
                        Anonnce
                    </a>
                </div>
            </div>

        </div>




        <h4 class="mb-3"> Mes annonces</h4>

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