<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>

    @vite('resources/js/app.js')

    <style>
        body {
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            min-height: 100vh;
        }

        .card {
            border: none;
            border-radius: 12px;
        }

        .message-card {
            transition: 0.3s;
        }

        .message-card:hover {
            transform: translateY(-3px);
        }
    </style>
</head>

<body>

<div class="container py-5">

    <h2 class="mb-4 text-center text-white">
        Messages reçus
    </h2>

    <div class="row justify-content-center">

        <div class="col-md-8">

            @forelse($messages as $msg)

                <div class="card message-card p-3 mb-3 shadow-sm">

                    <div class="d-flex justify-content-between align-items-center">

                        <strong class="text-primary">
                            De : {{ $msg->sender->name ?? 'Utilisateur' }}
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

            @empty

                <div class="alert alert-light text-center">
                    Aucun message reçu
                </div>

            @endforelse

            <!-- BUTTONS -->
            <div class="d-flex justify-content-between mt-4">

                <a href="{{ route('annonces.index') }}" class="btn btn-light">
                    Retour
                </a>

                <a href="{{ route('messages.sent') }}" class="btn btn-dark">
                    Messages envoyés
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>