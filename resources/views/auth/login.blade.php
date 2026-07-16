@extends('layouts.app')

@section('title','Login')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-5 col-md-7">

            <div class="text-center mb-5">

                <h1 class="fw-bold display-5">
                    Welcome Back 👋
                </h1>

                <p class="text-muted">
                    Login untuk melanjutkan perjalanan lari kamu.
                </p>

            </div>

            <div class="login-box">

                <form action="{{ route('login.authenticate') }}" method="POST">

                    @csrf

                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control modern-input mb-4"
                        placeholder="you@example.com">

                    <label>Password</label>

                    <input
                        type="password"
                        name="password"
                        class="form-control modern-input mb-3"
                        placeholder="••••••••">

                    <button class="btn btn-warning w-100 py-3 fw-bold">

                        Login

                    </button>

                </form>

                <div class="text-center mt-4">

                    Belum punya akun?

                    <a href="/register"
                       class="text-warning fw-bold text-decoration-none">

                        Daftar

                    </a>

                </div>

            </div>

            <div class="row text-center mt-5">

                <div class="col">

                    <h5>🏅</h5>

                    <small class="text-muted">
                        Marathon
                    </small>

                </div>

                <div class="col">

                    <h5>📍</h5>

                    <small class="text-muted">
                        30+ Kota
                    </small>

                </div>

                <div class="col">

                    <h5>👥</h5>

                    <small class="text-muted">
                        5000+ Runner
                    </small>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection