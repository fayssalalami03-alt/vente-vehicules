<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages envoyés</title>

    @vite("resources/js/app.js")

    <style>
        body {
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            min-height: 100vh;
        }

        .card {
            border: none;
            border-radius: 12px;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-3px);
        }
    </style>
</head>

<body>

<div class="container py-5">

    <h2 class="mb-4 text-center text-white">
        Messages envoyés
    </h2>

    <div class="row justify-content-center">

        <div class="col-md-8">

            @forelse($messages as $msg)

                <div class="card shadow-sm mb-3">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center">

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

                <div class="alert alert-light text-center">
                    Aucun message envoyé
                </div>

            @endforelse

            
            <div class="text-center mt-4">
                <a href="{{ route('home') }}" class="btn btn-light">
                    Home
                </a>
            </div>

        </div>

    </div>

</div>

</body>
</html>