@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<div class="container">

    {{-- HEADER --}}
    <div class="mb-5">
        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
            ADMIN PANEL
        </span>

        <div class="d-flex justify-content-between align-items-center flex-wrap mt-3">
            <div>
                <h1 class="fw-bold display-5 mb-2">Welcome Back 👋</h1>

                <p class="text-muted fs-5 mb-0">
                    Monitor seluruh event dan peserta Mau Run dari satu dashboard.
                </p>
            </div>

            <div class="d-flex gap-2">
                <a
                    href="{{ route('admin.registrations.index') }}"
                    class="btn btn-dark rounded-pill px-4">
                    Kelola Peserta
                </a>

                <a
                    href="{{ route('events.create') }}"
                    class="btn btn-warning rounded-pill px-4">
                    + Tambah Event
                </a>
            </div>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="row g-4 mb-5">
        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-number">{{ $totalEvent }}</div>
                <div class="stat-title">Total Event</div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-number">{{ $totalPeserta }}</div>
                <div class="stat-title">Peserta Aktif</div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-number">{{ $totalKota }}</div>
                <div class="stat-title">Kota</div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="stat-card">
                <div class="stat-number">{{ $totalJenis }}</div>
                <div class="stat-title">Jenis Event</div>
            </div>
        </div>
    </div>

    {{-- STATUS PESERTA --}}
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body text-center">
                    <h2 class="fw-bold text-warning">
                        {{ \App\Models\Registration::where('status', 'Pending')->count() }}
                    </h2>

                    <p class="text-muted mb-0">Menunggu Konfirmasi</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body text-center">
                    <h2 class="fw-bold text-success">
                        {{ \App\Models\Registration::where('status', 'Confirmed')->count() }}
                    </h2>

                    <p class="text-muted mb-0">Peserta Diterima</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body text-center">
                    <h2 class="fw-bold text-danger">
                        {{ \App\Models\Registration::where('status', 'Rejected')->count() }}
                    </h2>

                    <p class="text-muted mb-0">Pendaftaran Ditolak</p>
                </div>
            </div>
        </div>
    </div>

    {{-- QUICK ACTION --}}
<div class="row g-4 mb-5">

    <div class="col-md-3">
        <a href="{{ route('events.create') }}"
            class="card border-0 shadow-sm rounded-4 text-decoration-none text-dark h-100">

            <div class="card-body text-center py-4">
                <h1>➕</h1>
                <h5 class="fw-bold mt-3">
                    Tambah Event
                </h5>
                <small class="text-muted">
                    Buat event baru
                </small>
            </div>

        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('admin.registrations.index', ['status' => 'Pending']) }}"
            class="card border-0 shadow-sm rounded-4 text-decoration-none text-dark h-100">

            <div class="card-body text-center py-4">
                <h1>⏳</h1>
                <h5 class="fw-bold mt-3">
                    Verifikasi
                </h5>
                <small class="text-muted">
                    Peserta Pending
                </small>
            </div>

        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('events.index') }}"
            class="card border-0 shadow-sm rounded-4 text-decoration-none text-dark h-100">

            <div class="card-body text-center py-4">
                <h1>🏃</h1>
                <h5 class="fw-bold mt-3">
                    Kelola Event
                </h5>
                <small class="text-muted">
                    Lihat semua event
                </small>
            </div>

        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('admin.registrations.index') }}"
            class="card border-0 shadow-sm rounded-4 text-decoration-none text-dark h-100">

            <div class="card-body text-center py-4">
                <h1>👥</h1>
                <h5 class="fw-bold mt-3">
                    Kelola Peserta
                </h5>
                <small class="text-muted">
                    Semua pendaftaran
                </small>
            </div>

        </a>
    </div>

</div>

    {{-- EVENT TERBARU --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Event Terbaru</h3>

            <p class="text-muted mb-0">
                Event yang baru ditambahkan.
            </p>
        </div>

        <a
            href="{{ route('events.index') }}"
            class="fw-semibold text-decoration-none">
            Lihat Semua →
        </a>
    </div>

    <div class="row">
        @foreach ($events->take(3) as $event)
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow rounded-4 overflow-hidden h-100">

                    <img
                        src="{{ asset('images/' . $event->image) }}"
                        style="height: 220px; object-fit: cover;">

                    <div class="card-body d-flex flex-column">

                        <span class="badge bg-warning text-dark">
                            {{ $event->eventType->name }}
                        </span>

                        <h4 class="fw-bold mt-3">{{ $event->nama_event }}</h4>

                        <p class="text-muted mb-2">
                            📍 {{ $event->city->name }}
                        </p>

                        <p class="text-muted mb-2">
                            📅 {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                        </p>

                        <p class="text-muted mb-2">
                            👥 {{ $event->registrations()->whereIn('status', ['Pending', 'Confirmed'])->count() }} Peserta
                        </p>

                        <p class="text-muted">
                            🎟️ Sisa Kuota :
                            <strong>{{ $event->kuota }}</strong>
                        </p>

                        <div class="mt-auto d-flex gap-2">
                            <a
                                href="{{ route('events.show', $event->id) }}"
                                class="btn btn-dark w-100">
                                Detail
                            </a>

                            <a
                                href="{{ route('events.edit', $event->id) }}"
                                class="btn btn-warning w-100">
                                Edit
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection