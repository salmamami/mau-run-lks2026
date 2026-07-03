@extends('layouts.app')

@section('title', 'Mau Run')

@section('content')

<div class="p-5 mb-5 bg-white rounded-4 shadow-sm">

    <div class="row align-items-center">

        <div class="col-md-7">

            <h1 class="display-5 fw-bold">
                🏃 Mau Run 2026
            </h1>

            <p class="lead">
                Temukan event lari terbaik di berbagai kota dan daftar secara online dengan mudah.
            </p>

            <a href="/register" class="btn btn-primary btn-lg">
                Daftar Sekarang
            </a>

        </div>

        <div class="col-md-5 text-center">

            <img src="https://images.unsplash.com/photo-1552674605-db6ffd4facb5?w=600"
                 class="img-fluid rounded-4">

        </div>

    </div>

</div>

<h3 class="mb-4">
    Event Populer
</h3>

<div class="row">

    <div class="col-md-4 mb-4">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <h5>Grow Run 2026</h5>

                <p class="text-muted">
                    Full Marathon
                </p>

                <p>
                    📍 Jakarta
                </p>

                <p>
                    📅 15 Agustus 2026
                </p>

                <button class="btn btn-primary">
                    Detail Event
                </button>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <h5>Healthy Run</h5>

                <p class="text-muted">
                    10K
                </p>

                <p>
                    📍 Semarang
                </p>

                <p>
                    📅 20 September 2026
                </p>

                <button class="btn btn-primary">
                    Detail Event
                </button>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-4">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <h5>Sae Run</h5>

                <p class="text-muted">
                    5K
                </p>

                <p>
                    📍 Yogyakarta
                </p>

                <p>
                    📅 10 Oktober 2026
                </p>

                <button class="btn btn-primary">
                    Detail Event
                </button>

            </div>

        </div>

    </div>

</div>

@endsection