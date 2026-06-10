<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Vehicle Marketplace')</title>
    @vite('resources/js/app.js')
    <style>
        body {
            background: #f8f9fa;
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card-hover:hover {
            transform: translateY(-5px);
            transition: 0.3s;
        }

        footer {
            background: #212529;
            color: white;
            padding: 20px 0;
            margin-top: 50px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                Vehicle-vente
            </a>

            @if(Auth::check())
                <span class="text-white ms-3">
                    Bienvenue : <strong>{{ Auth::user()->name }}</strong>
                </span>
            @endif

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse  navbar-collapse" id="nav">
                <ul class="navbar-nav ms-auto align-items-center gap-2 flex-row">

                    <form method="GET" action="{{ route('annonces.index') }}" class="d-flex align-items-center  gap-2">

                        <input type="text" name="search" value="{{ request('search') }}"
                            class="form-control form-control-sm" placeholder="Rechercher...">

                        <select name="category" class="form-select form-select-sm">
                            <option value="">Catégories</option>
                            <option value="1">Voiture</option>
                            <option value="2">Moto</option>
                        </select>

                        <button class="btn btn-primary  btn-sm">
                            RECH
                        </button>
                    </form>

                    @auth
                        @if(Auth::user()->role == "admin")
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                    Dashboard
                                </a>
                            </li>
                        @endif

                       
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button class="btn btn-danger btn-sm ms-2">
                                    Logout
                                </button>
                            </form>
                        </li>

                    @else
                       
                        <li class="nav-item">
                            <a class="btn btn-primary btn-sm ms-2" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-4">
        @yield('content')
    </div>

</body>

</html>