<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    @vite('resources/js/app.js')
    <style>
        .chat-box {
            height: 400px;
            overflow-y: auto;
            background: #f8f9fa;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container py-4">

        <div class="card p-3 shadow">

            <h4 class="mb-3">
                Chat avec {{ $user->name ?? 'Utilisateur' }}
            </h4>

            <div class="chat-box mb-3">

                @forelse($messages as $msg)

                    <div class="mb-2 text-{{ $msg->sender_id == auth()->id() ? 'end' : 'start' }}">

                        <span class="badge bg-{{ $msg->sender_id == auth()->id() ? 'primary' : 'secondary' }}">
                            {{ $msg->message }}
                        </span>

                    </div>

                @empty
                    <p class="text-muted">Aucun message</p>
                @endforelse

            </div>

            <form method="POST" action="{{ route('message.store') }}">
                @csrf

                <input type="hidden" name="receiver_id" value="{{ $user->id }}">

                <textarea name="message" class="form-control" rows="2" placeholder="Écrire un message..."></textarea>

                <button class="btn btn-primary mt-2 w-100">
                    Envoyer
                </button>

            </form>
  
            <a href="{{ route('annonces.index') }}" class="btn btn-secondary">
                Retour
            </a>
        </div>

    </div>

</body>

</html>