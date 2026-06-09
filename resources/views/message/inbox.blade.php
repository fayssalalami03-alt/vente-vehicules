<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>
    @vite('resources/js/app.js')
</head>

<body class="bg-light">

    <div class="container py-4">

        <h2 class="mb-4">Messages reçus</h2>

        @forelse($messages as $msg)

            <div class="card p-3 mb-3 shadow-sm">

                <div class="d-flex justify-content-between">

                    <strong>
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

            <div class="alert alert-info">
                Aucun message
            </div>

        @endforelse

    </div>
    <a href="{{ route('annonces.index') }}" class="btn btn-secondary">
        Retour
    </a>
    <a href="{{ route('messages.sent') }}" class="btn btn-secondary">
       Mesmessage
    </a>

</body>

</html>