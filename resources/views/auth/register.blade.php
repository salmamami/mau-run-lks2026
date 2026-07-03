@extends('layouts.app')

@section('title', 'Register')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-5">

        <div class="card shadow">

            <div class="card-body p-4">

                <h2 class="text-center mb-4">
                    Register Peserta
                </h2>

                <form action="{{ route('register.store') }}"
                      method="POST">

                    @csrf

                    <div class="mb-3">
                        <label>Nama</label>

                        <input type="text"
                               name="name"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>

                        <input type="email"
                               name="email"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Password</label>

                        <input type="password"
                               name="password"
                               class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Konfirmasi Password</label>

                        <input type="password"
                               name="password_confirmation"
                               class="form-control">
                    </div>

                    <button class="btn btn-primary w-100">
                        Register
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection