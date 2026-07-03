<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mau Run')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background-color: #F8FAFC;
        }

        .navbar-brand{
            font-weight:700;
        }

        .card{
            border:none;
            border-radius:16px;
        }

        .btn-primary{
            border-radius:10px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">

        <a class="navbar-brand" href="/">
            🏃 Mau Run
        </a>

        <div>

            @auth

                <form action="{{ route('logout') }}"
                      method="POST"
                      class="d-inline">
                    @csrf

                    <button class="btn btn-light">
                        Logout
                    </button>
                </form>

            @else

                <a href="/login"
                   class="btn btn-outline-light me-2">
                    Login
                </a>

                <a href="/register"
                   class="btn btn-light">
                    Register
                </a>

            @endauth

        </div>

    </div>
</nav>

<div class="container py-4">

    @yield('content')

</div>

</body>
</html>