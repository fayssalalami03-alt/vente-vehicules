<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite("resources/js/app.js")
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand fw-bold" href="/">
            🚗 Vehicle-vente
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navVisitor">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navVisitor">

            <ul class="navbar-nav ms-auto align-items-center">

       
                <li class="nav-item ms-2">
                    <a class="btn btn-outline-light btn-sm" href="{{ route('annonces.index') }}">
                        Anonnce
                    </a>
                </li>

                <li class="nav-item ms-2">
                    <a class="btn btn-primary btn-sm" href="{{ route("login") }}">
                        Connexion
                    </a>
                </li>


            </ul>

        </div>

    </div>
</nav>

    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow border-0">
                <div class="card-body p-4">

                    <h3 class="text-center mb-4">Create Account</h3>

                    <form method="POST" action="/register">
                        @csrf


                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" name="name" placeholder="Enter your name" class="form-control"
                                value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prenom</label>
                            <input type="text" name="prenom" placeholder="Enter your prenom" class="form-control"
                                value="{{ old('prenom') }}" required>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" placeholder="example@gmail.com" class="form-control"
                                value="{{ old('email') }}" required>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" placeholder="06XXXXXXXX" class="form-control"
                                value="{{ old('phone') }}">
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" placeholder="Enter your password" class="form-control"
                                required>
                        </div>


                        <button class="btn btn-primary w-100">
                            Register
                        </button>

                    </form>

                    <p class="text-center mt-3">
                        si tu as déjà un compte ?
                        <a href="/login">Login</a>
                    </p>

                </div>
            </div>

        </div>
    </div>
</body>
</html>