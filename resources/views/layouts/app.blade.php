<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mau Run')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">

    <div class="container">

        <a class="navbar-brand" href="/">
            🏃 Mau Run
        </a>

        <button class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
             id="navbarMenu">

            <ul class="navbar-nav ms-auto align-items-center">

                <li class="nav-item me-3">
                    <a href="/" class="nav-link">
                        Home
                    </a>
                </li>

                @auth

                    @if(Auth::user()->role=='admin')

                        <li class="nav-item me-3">

                            <a href="{{ route('admin.dashboard') }}"
                               class="nav-link">

                                Dashboard

                            </a>

                        </li>

                    @else

                        <li class="nav-item me-3">

                            <a href="{{ route('peserta.dashboard') }}"
                               class="nav-link">

                                Dashboard

                            </a>

                        </li>

                    @endif

                    <li class="nav-item">

                        <form action="{{ route('logout') }}"
                              method="POST">

                            @csrf

                            <button class="btn btn-warning">

                                Logout

                            </button>

                        </form>

                    </li>

                @else

                    <li class="nav-item me-2">

                        <a href="/login"
                           class="btn btn-outline-warning">

                            Login

                        </a>

                    </li>

                    <li class="nav-item">

                        <a href="/register"
                           class="btn btn-warning">

                            Register

                        </a>

                    </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>

<div class="container py-5">

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    @yield('content')

</div>

<footer class="footer">

    <div class="container text-center">

        <h5 class="fw-bold">
            Mau Run
        </h5>

        <p class="text-muted mb-0">

            Run Your Journey • 2026

        </p>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>