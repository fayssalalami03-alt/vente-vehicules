@extends('admin.layout')

@section('title', 'Dashboard Admin')

@section('content')

<div class="container">

    <h2 class="mb-4">Dashboard</h2>

    <div class="row">

        <div class="col-md-3">
            <div class="card bg-primary text-white p-3">
                <h5>Users</h5>
                <h3>{{ $usersCount }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white p-3">
                <h5>Annonces</h5>
                <h3>{{ $annoncesCount }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning text-dark p-3">
                <h5>Catégories</h5>
                <h3>{{ $categoriesCount }}</h3>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-danger text-white p-3">
                <h5>Messages</h5>
                <h3>{{ $messagesCount }}</h3>
            </div>
        </div>

    </div>

    <div class="card mt-4">
        <div class="card-header bg-dark text-white">
            Dernières annonces
        </div>

        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Prix</th>
                        <th>Ville</th>
                        <th>User</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($latestAnnonces as $annonce)
                    <tr>
                        <td>{{ $annonce->title }}</td>
                        <td>{{ $annonce->prix }} DH</td>
                        <td>{{ $annonce->ville }}</td>
                        <td>{{ $annonce->user->name ?? 'Unknown' }}</td>

                        <td>
                            <a href="{{ route('annonces.show', $annonce->id) }}" class="btn btn-info btn-sm">
                                Voir
                            </a>

                            <form action="{{ route('annonces.destroy', $annonce->id) }}"
                                  method="POST"
                                  style="display:inline"
                                  onsubmit="return confirm('Supprimer cette annonce ?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection