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
             Vehicle-vente
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
                    <a class="btn btn-success btn-sm" href="/register">
                        Inscription
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>
<div class="row justify-content-center">
    <div class="col-md-5">

        <div class="card shadow-lg border-0">
            <div class="card-body p-4">

                <h3 class="text-center mb-4"> Login</h3>

                <form method="POST" action="/login">
                    @csrf

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button class="btn btn-dark w-100">
                        Login
                    </button>
                </form>

              
            </div>
        </div>

    </div>
</div>
</body>
</html>