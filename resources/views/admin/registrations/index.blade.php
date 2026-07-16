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

        <a
            href="{{ route('admin.dashboard') }}"
            class="btn btn-outline-warning">
            ← Kembali
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success rounded-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>Event</th>
                            <th>Peserta</th>
                            <th>Kontak</th>
                            <th>Jersey</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th width="170">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($registrations as $registration)
                            <tr>

                                <td>
                                    <strong>{{ $registration->event->nama_event }}</strong><br>

                                    <small class="text-muted">
                                        {{ $registration->event->city->name }}
                                    </small>
                                </td>

                                <td>
                                    <strong>{{ $registration->nama_lengkap }}</strong><br>

                                    <small class="text-muted">
                                        NIK: {{ $registration->nik }}
                                    </small>
                                </td>

                                <td>
                                    {{ $registration->email }}<br>

                                    <small class="text-muted">
                                        {{ $registration->no_hp }}
                                    </small>
                                </td>

                                <td>{{ $registration->ukuran_jersey }}</td>

                                <td>
                                    Rp {{ number_format($registration->total_bayar, 0, ',', '.') }}
                                </td>

                                <td>
                                    @if ($registration->status == 'Pending')
                                        <span class="badge bg-warning text-dark">
                                            Pending
                                        </span>
                                    @elseif ($registration->status == 'Confirmed')
                                        <span class="badge bg-success">
                                            Confirmed
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            Rejected
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    @if ($registration->status == 'Pending')
                                        <div class="d-flex gap-2">

                                            <form
                                                action="{{ route('admin.registrations.confirm', $registration) }}"
                                                method="POST">

                                                @csrf
                                                @method('PATCH')

                                                <button class="btn btn-success btn-sm">
                                                    Confirm
                                                </button>
                                            </form>

                                            <form
                                                action="{{ route('admin.registrations.reject', $registration) }}"
                                                method="POST">

                                                @csrf
                                                @method('PATCH')

                                                <button class="btn btn-danger btn-sm">
                                                    Reject
                                                </button>
                                            </form>

                                        </div>
                                    @else
                                        <span class="text-muted">
                                            Tidak ada aksi
                                        </span>
                                    @endif
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <h5 class="fw-bold">
                                        Belum ada peserta.
                                    </h5>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $registrations->links() }}
    </div>

</div>

@endsection