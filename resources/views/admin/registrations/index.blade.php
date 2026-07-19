@extends('layouts.app')

@section('title', 'Kelola Peserta')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Kelola Peserta</h2>
            <p class="text-muted mb-0">
                Kelola seluruh pendaftaran peserta Mau Run.
            </p>
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="btn btn-outline-warning rounded-pill px-4">
            ← Kembali
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-3 mb-4">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 text-center p-4">
                <h2 class="fw-bold text-warning mb-1">
                    {{ $pending }}
                </h2>
                <span class="text-muted">Pending</span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 text-center p-4">
                <h2 class="fw-bold text-success mb-1">
                    {{ $confirmed }}
                </h2>
                <span class="text-muted">Confirmed</span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 text-center p-4">
                <h2 class="fw-bold text-danger mb-1">
                    {{ $rejected }}
                </h2>
                <span class="text-muted">Rejected</span>
            </div>
        </div>

    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body">

            <form method="GET">

                <div class="row g-3 align-items-end">

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Cari Peserta
                        </label>

                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Nama, email, NIK, No HP, Event..."
                               value="{{ request('search') }}">

                    </div>

                    <div class="col-md-3">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="status" class="form-select">

                            <option value="">Semua Status</option>

                            <option value="Pending"
                                {{ request('status') == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="Confirmed"
                                {{ request('status') == 'Confirmed' ? 'selected' : '' }}>
                                Confirmed
                            </option>

                            <option value="Rejected"
                                {{ request('status') == 'Rejected' ? 'selected' : '' }}>
                                Rejected
                            </option>

                        </select>

                    </div>

                    <div class="col-md-3 d-flex gap-2">

                        <button class="btn btn-warning w-100">
                            Filter
                        </button>

                        <a href="{{ route('admin.registrations.index') }}"
                           class="btn btn-outline-secondary">
                            Reset
                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th width="70">No</th>
                        <th>Peserta</th>
                        <th>Event</th>
                        <th>Kontak</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th width="260" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($registrations as $registration)

                        <tr>

                            <td class="fw-semibold">
                                {{ $registrations->firstItem() + $loop->index }}
                            </td>

                            <td>

                                <div class="fw-bold">
                                    {{ $registration->nama_lengkap }}
                                </div>

                                <small class="text-muted d-block">
                                    NIK :
                                    {{ str_repeat('*', 12) . substr($registration->nik, -4) }}
                                </small>

                                <small class="text-muted">
                                    Jersey :
                                    {{ $registration->ukuran_jersey }}
                                </small>

                            </td>

                            <td>

                                <div class="fw-semibold">
                                    {{ $registration->event->nama_event }}
                                </div>

                                <small class="text-muted">
                                    📍 {{ $registration->event->city->name }}
                                </small>

                            </td>

                            <td>

                                <div>
                                    ✉ {{ $registration->email }}
                                </div>

                                <small class="text-muted">
                                    📱 {{ $registration->no_hp }}
                                </small>

                            </td>

                            <td>

                                <div class="fw-bold text-warning">
                                    Rp {{ number_format($registration->total_bayar, 0, ',', '.') }}
                                </div>

                                @if($registration->kode_kupon)
                                    <small class="text-success">
                                        Kupon {{ $registration->kode_kupon }}
                                    </small>
                                @endif

                            </td>

                            <td>

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

                            </td>

                            <td>

                                <div class="d-flex justify-content-center gap-2 flex-wrap">

                                    <a href="{{ route('admin.registrations.show', $registration) }}"
                                       class="btn btn-outline-primary btn-sm">
                                        Detail
                                    </a>

                                    @if($registration->status == 'Pending')

                                        <form action="{{ route('admin.registrations.confirm', $registration) }}"
                                              method="POST">

                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                    class="btn btn-success btn-sm">
                                                Confirm
                                            </button>

                                        </form>

                                        <form action="{{ route('admin.registrations.reject', $registration) }}"
                                              method="POST">

                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menolak pendaftaran ini?')">
                                                Reject
                                            </button>

                                        </form>

                                    @else

                                        <span class="text-muted small align-self-center">
                                            Tidak ada aksi
                                        </span>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center py-5">

                                <h5 class="fw-bold mb-2">
                                    Data peserta tidak ditemukan
                                </h5>

                                <p class="text-muted mb-0">
                                    Belum ada data yang sesuai dengan filter.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-4">
        {{ $registrations->links() }}
    </div>

</div>

@endsection