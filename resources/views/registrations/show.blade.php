@extends('layouts.app')

@section('title', 'Detail Pendaftaran')

@section('content')

<div class="container py-5">
    <div class="row g-4">

        {{-- LEFT --}}
        <div class="col-lg-8">

            <img src="{{ asset('images/'.$registration->event->image) }}"
                class="event-banner mb-4">

            <div class="description-card">

                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    {{ $registration->event->eventType->name }}
                </span>

                <h1 class="fw-bold mb-2">
                    {{ $registration->event->nama_event }}
                </h1>

                <p class="text-muted mb-4">
                    📅 {{ \Carbon\Carbon::parse($registration->event->tanggal)->format('d F Y') }}
                    &nbsp;&nbsp;&nbsp;
                    📍 {{ $registration->event->city->name }}
                    &nbsp;&nbsp;&nbsp;
                    🏃 {{ $registration->event->jarak }}
                </p>

                <hr class="my-4">

                <h3 class="fw-bold mb-4">
                    Data Peserta
                </h3>

                <table class="table align-middle">

                    <tr>
                        <th width="35%">Nama</th>
                        <td>{{ $registration->nama_lengkap }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ $registration->email }}</td>
                    </tr>

                    <tr>
                        <th>NIK</th>
                        <td>{{ $registration->nik }}</td>
                    </tr>

                    <tr>
                        <th>No HP</th>
                        <td>{{ $registration->no_hp }}</td>
                    </tr>

                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $registration->jenis_kelamin }}</td>
                    </tr>

                    <tr>
                        <th>Ukuran Jersey</th>
                        <td>{{ $registration->ukuran_jersey }}</td>
                    </tr>

                </table>

                <hr class="my-5">

                <h3 class="fw-bold mb-4">
                    Race Pack
                </h3>

                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="info-card">
                            👕
                            <h5 class="mt-3">Official Jersey</h5>
                            <p class="text-muted mb-0">
                                Size {{ $registration->ukuran_jersey }}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-card">
                            🏅
                            <h5 class="mt-3">Finisher Medal</h5>
                            <p class="text-muted mb-0">
                                Diberikan setelah finish
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-card">
                            📜
                            <h5 class="mt-3">E-Certificate</h5>
                            <p class="text-muted mb-0">
                                Dikirim setelah event selesai
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-card">
                            🎫
                            <h5 class="mt-3">Race Pack</h5>
                            <p class="text-muted mb-0">
                                Race Bib + Goodie Bag
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        {{-- RIGHT --}}
        <div class="col-lg-4">

            <div class="register-card">

                <h3 class="fw-bold mb-4">
                    Status Pendaftaran
                </h3>

                @if($registration->status == 'Pending')
                    <div class="alert alert-warning text-center fw-bold">
                        ⏳ PENDING
                    </div>
                @elseif($registration->status == 'Confirmed')
                    <div class="alert alert-success text-center fw-bold">
                        ✅ CONFIRMED
                    </div>
                @else
                    <div class="alert alert-danger text-center fw-bold">
                        ❌ REJECTED
                    </div>
                @endif

                <hr>

                <p class="text-muted mb-2">
                    Registration ID
                </p>

                <h5 class="fw-bold">
                    #MR{{ str_pad($registration->id, 5, '0', STR_PAD_LEFT) }}
                </h5>

                <hr>

                <div class="d-flex justify-content-between mb-2">
                    <span>Harga Event</span>
                    <strong>
                        Rp {{ number_format($registration->event->harga,0,',','.') }}
                    </strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span>Diskon</span>
                    <strong>
                        Rp {{ number_format($registration->diskon,0,',','.') }}
                    </strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span>Biaya Admin</span>
                    <strong>Rp 0</strong>
                </div>

                <hr>

                <div class="d-flex justify-content-between align-items-center">
                    <h5>Total Bayar</h5>

                    <h3 class="fw-bold text-warning">
                        Rp {{ number_format($registration->total_bayar,0,',','.') }}
                    </h3>
                </div>

                <a href="{{ route('peserta.dashboard') }}"
                    class="btn btn-outline-warning w-100 mt-4">

                    ← Kembali ke Dashboard

                </a>

            </div>

        </div>

    </div>
</div>

@endsection