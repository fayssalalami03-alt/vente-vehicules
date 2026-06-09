<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite('resources/js/app.js')

    <style>
        body {
            background: #f4f6f9;
        }

        .sidebar {
            height: 100vh;
            background: #212529;
            color: white;
            position: fixed;
            width: 200px;
            padding: 20px;
        }

        .sidebar a {
            color: white;
            display: block;
            margin: 10px 0;
            text-decoration: none;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h4>Admin</h4>

        <a href="{{ route('home') }}">Mon Contact</a>
        <a href="{{ route('annonces.index') }}">Annonces</a>
        <p>nom:</p>
        <strong>{{ Auth::user()->name }}</strong>
        <p>email:</p>
        <strong>{{ Auth::user()->email }}</strong>
        <p>phone:</p>
        <strong>{{ Auth::user()->phone }}</strong>
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>

</html>