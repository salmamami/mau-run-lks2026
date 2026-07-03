@extends('layouts.app')

@section('title', 'Dashboard Peserta')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Dashboard Peserta</h2>

    <a href="/" class="btn btn-primary">
        Lihat Event
    </a>

</div>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card shadow-sm mb-4">

    <div class="card-body">

        <h3>
            Selamat datang, {{ Auth::user()->name }}
        </h3>

        <p class="text-muted mb-0">
            Berikut daftar event yang sudah kamu ikuti.
        </p>

    </div>

</div>

<h4 class="mb-3">Event Saya</h4>

@if($registrations->count())

    @foreach($registrations as $registration)

    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <div class="row">

                <div class="col-md-8">

                    <h4>
                        {{ $registration->event->nama_event }}
                    </h4>

                    <p class="mb-1">
                        <strong>Jenis Event :</strong>
                        {{ $registration->event->eventType->name }}
                    </p>

                    <p class="mb-1">
                        <strong>Kota :</strong>
                        {{ $registration->event->city->name }}
                    </p>

                    <p class="mb-1">
                        <strong>Tanggal :</strong>
                        {{ \Carbon\Carbon::parse($registration->event->tanggal)->format('d F Y') }}
                    </p>

                </div>

                <div class="col-md-4">

                    <p class="mb-1">
                        <strong>Harga</strong><br>
                        Rp {{ number_format($registration->event->harga,0,',','.') }}
                    </p>

                    <p class="mb-1">
                        <strong>Diskon</strong><br>
                        Rp {{ number_format($registration->diskon,0,',','.') }}
                    </p>

                    <p class="mb-1">
                        <strong>Total Bayar</strong><br>
                        Rp {{ number_format($registration->total_bayar,0,',','.') }}
                    </p>

                    <p class="mb-1">
                        <strong>Ukuran Jersey</strong><br>
                        {{ $registration->ukuran_jersey }}
                    </p>

                </div>

            </div>

        </div>

    </div>

    @endforeach

@else

<div class="alert alert-warning">
    Kamu belum mengikuti event apa pun.
</div>

@endif

@endsection