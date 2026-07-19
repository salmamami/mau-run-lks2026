@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<div class="container">
    {{-- Header --}}
    <div class="mb-5">
        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
            ADMIN PANEL
        </span>

        <div class="d-flex justify-content-between align-items-center flex-wrap mt-3">
            <div>
                <h1 class="fw-bold display-5 mb-2">
                    Welcome Back 👋
                </h1>

                <p class="text-muted fs-5">
                    Kelola seluruh event dan peserta Mau Run dari satu dashboard.
                </p>
            </div>

            <div class="d-flex gap-2">
                <a
                    href="{{ route('admin.registrations.index') }}"
                    class="btn btn-outline-dark btn-lg rounded-pill">
                    Kelola Peserta
                </a>

                <a
                    href="{{ route('events.create') }}"
                    class="btn btn-warning btn-lg rounded-pill">
                    + Tambah Event
                </a>
            </div>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-number">{{ $totalEvent }}</div>
                <div class="stat-title">Total Event</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-number">{{ $totalPeserta }}</div>
                <div class="stat-title">Total Peserta</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-number">{{ $totalKota }}</div>
                <div class="stat-title">Total Kota</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-number">{{ $totalJenis }}</div>
                <div class="stat-title">Jenis Event</div>
            </div>
        </div>
    </div>

    {{-- Event Terbaru --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Event Terbaru</h2>

            <p class="text-muted mb-0">
                Event yang baru ditambahkan ke sistem.
            </p>
        </div>

        <a
            href="{{ route('events.index') }}"
            class="text-decoration-none fw-semibold">
            Lihat Semua →
        </a>
    </div>

    <div class="row">
        @forelse ($events->take(3) as $event)
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                    <img
                        src="{{ asset('images/' . $event->image) }}"
                        style="height: 220px; width: 100%; object-fit: cover;">

                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-warning text-dark">
                            {{ $event->eventType->name }}
                        </span>

                        <h4 class="fw-bold mt-3">
                            {{ $event->nama_event }}
                        </h4>

                        <p class="text-muted mb-1">
                            📍 {{ $event->city->name }}
                        </p>

                        <p class="text-muted mb-1">
                            📅 {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                        </p>

                        <p class="text-muted mb-3">
                            👥 {{ $event->registrations()->whereIn('status', ['Pending', 'Confirmed'])->count() }} Peserta
                        </p>

                        <h5 class="fw-bold text-warning mb-4">
                            Rp {{ number_format($event->harga, 0, ',', '.') }}
                        </h5>

                        <div class="mt-auto d-flex gap-2">
                            <a
                                href="{{ route('events.edit', $event->id) }}"
                                class="btn btn-outline-warning w-100">
                                Edit
                            </a>

                            <form
                                action="{{ route('events.destroy', $event->id) }}"
                                method="POST"
                                class="w-100">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-outline-danger w-100"
                                    onclick="return confirm('Yakin ingin menghapus event ini?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="empty-admin">
                    <h4 class="mb-3">Belum ada event.</h4>

                    <a
                        href="{{ route('events.create') }}"
                        class="btn btn-warning">
                        Tambah Event
                    </a>
                </div>
            </div>
        @endforelse
    </div>
</div>

@endsection