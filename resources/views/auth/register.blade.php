@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="text-center mb-5">
                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    👋 Join Mau Run
                </span>

                <h1 class="fw-bold display-5">
                    Create Account
                </h1>

                <p class="text-muted">
                    Lengkapi data diri untuk mempermudah pendaftaran event.
                </p>
            </div>

            <div class="login-box">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register.store') }}" method="POST">
                    @csrf

                    <label class="fw-semibold mb-2">Nama Lengkap</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control modern-input mb-3"
                        placeholder="Masukkan nama lengkap">

                    <label class="fw-semibold mb-2">NIK</label>
                    <input
                        type="text"
                        name="nik"
                        value="{{ old('nik') }}"
                        class="form-control modern-input mb-3"
                        placeholder="16 digit NIK">

                    <label class="fw-semibold mb-2">Nomor HP</label>
                    <input
                        type="text"
                        name="no_hp"
                        value="{{ old('no_hp') }}"
                        class="form-control modern-input mb-3"
                        placeholder="08xxxxxxxxxx">

                    <label class="fw-semibold mb-2">Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control modern-input mb-3"
                        placeholder="you@example.com">

                    <label class="fw-semibold mb-2">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control modern-input mb-3"
                        placeholder="Minimal 8 karakter">

                    <label class="fw-semibold mb-2">Konfirmasi Password</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control modern-input mb-4"
                        placeholder="Ulangi password">

                    <button class="btn btn-warning w-100 py-3 fw-bold">
                        Create Account
                    </button>
                </form>

                <div class="text-center mt-4">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-warning fw-bold text-decoration-none">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection