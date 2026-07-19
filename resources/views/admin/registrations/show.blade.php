@extends('layouts.app')

@section('title', 'Detail Peserta')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Detail Peserta
            </h2>

            <p class="text-muted mb-0">
                Informasi lengkap pendaftaran peserta Mau Run.
            </p>
        </div>

        <a
            href="{{ route('admin.registrations.index') }}"
            class="btn btn-outline-warning rounded-pill px-4">
            ← Kembali
        </a>

    </div>

    <div class="row g-4">

        <div class="col-lg-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">
                        👤 Data Peserta
                    </h5>

                    <div class="mb-3">
                        <small class="text-muted">Nama Lengkap</small>
                        <h6 class="fw-semibold mb-0">
                            {{ $registration->nama_lengkap }}
                        </h6>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted">Email</small>
                        <h6 class="fw-semibold mb-0">
                            {{ $registration->email }}
                        </h6>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted">NIK</small>
                        <h6 class="fw-semibold mb-0">
                            {{ $registration->nik }}
                        </h6>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted">Nomor HP</small>
                        <h6 class="fw-semibold mb-0">
                            {{ $registration->no_hp }}
                        </h6>
                    </div>

                    <div class="row">

                        <div class="col-6">

                            <small class="text-muted">
                                Jenis Kelamin
                            </small>

                            <h6 class="fw-semibold">
                                {{ $registration->jenis_kelamin }}
                            </h6>

                        </div>

                        <div class="col-6">

                            <small class="text-muted">
                                Jersey
                            </small>

                            <h6 class="fw-semibold">
                                {{ $registration->ukuran_jersey }}
                            </h6>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">
                        🏃 Data Event
                    </h5>

                    <div class="mb-3">
                        <small class="text-muted">Nama Event</small>
                        <h6 class="fw-semibold mb-0">
                            {{ $registration->event->nama_event }}
                        </h6>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted">Kota</small>
                        <h6 class="fw-semibold mb-0">
                            {{ $registration->event->city->name }}
                        </h6>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted">Kategori</small>
                        <h6 class="fw-semibold mb-0">
                            {{ $registration->event->eventType->name }}
                        </h6>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Harga</span>
                        <strong>
                            Rp {{ number_format($registration->event->harga,0,',','.') }}
                        </strong>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Diskon</span>
                        <strong class="text-success">
                            - Rp {{ number_format($registration->diskon,0,',','.') }}
                        </strong>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <span class="fw-bold">
                            Total Bayar
                        </span>

                        <h5 class="fw-bold text-warning mb-0">
                            Rp {{ number_format($registration->total_bayar,0,',','.') }}
                        </h5>
                    </div>

                    <hr>

                    <div class="mb-4">

                        <small class="text-muted">
                            Status Pendaftaran
                        </small>

                        <div class="mt-2">

                            @if($registration->status == 'Pending')
                                <span class="badge bg-warning text-dark px-3 py-2">
                                    Pending
                                </span>
                            @elseif($registration->status == 'Confirmed')
                                <span class="badge bg-success px-3 py-2">
                                    Confirmed
                                </span>
                            @else
                                <span class="badge bg-danger px-3 py-2">
                                    Rejected
                                </span>
                            @endif

                        </div>

                    </div>

                    @if($registration->status == 'Pending')

                        <div class="d-grid gap-2">

                            <form
                                action="{{ route('admin.registrations.confirm', $registration) }}"
                                method="POST">

                                @csrf
                                @method('PATCH')

                                <button class="btn btn-success w-100">
                                    ✓ Confirm Peserta
                                </button>

                            </form>

                            <form
                                action="{{ route('admin.registrations.reject', $registration) }}"
                                method="POST">

                                @csrf
                                @method('PATCH')

                                <button class="btn btn-danger w-100">
                                    ✕ Reject Peserta
                                </button>

                            </form>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection