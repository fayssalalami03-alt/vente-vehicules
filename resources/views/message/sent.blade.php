<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite("resources/js/app.js")
</head>

<body class="bg-light">

    <div class="container py-4">

        <h2 class="mb-4 text-center">Messages envoyés</h2>

        <div class="row justify-content-center">

            <div class="col-md-8">

                @forelse($messages as $msg)

                    <div class="card shadow-sm mb-3 border-0">

                        <div class="card-body">

                            <div class="d-flex justify-content-between">

                                <strong class="text-primary">
                                    À : {{ $msg->receiver->name ?? 'Utilisateur' }}
                                </strong>

                                <small class="text-muted">
                                    {{ $msg->created_at->format('d/m/Y H:i') }}
                                </small>

                            </div>

                            <hr>

                            <p class="mb-0">
                                {{ $msg->message }}
                            </p>

                        </div>

                    </div>

                @empty

                    <div class="alert alert-info text-center">
                        Aucun message envoyé
                    </div>

                @endforelse

            </div>

        </div>

    </div>
    <a class="btn btn-info" href="{{ route('home') }}">
       Home
    </a>
</body>

</html>