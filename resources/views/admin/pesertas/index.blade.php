@extends('layouts.app')

@section('title', 'Detail Peserta')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">{{ $peserta->name }}</h2>

            <p class="text-muted">
                Detail akun peserta.
            </p>
        </div>

        <a
            href="{{ route('admin.pesertas.index') }}"
            class="btn btn-outline-warning">
            ← Kembali
        </a>
    </div>

    <div class="row">

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">

                    <h4 class="fw-bold mb-4">Informasi Peserta</h4>

                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $peserta->name }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $peserta->email }}</td>
                        </tr>

                        <tr>
                            <th>NIK</th>
                            <td>{{ $peserta->nik }}</td>
                        </tr>

                        <tr>
                            <th>No HP</th>
                            <td>{{ $peserta->no_hp }}</td>
                        </tr>

                        <tr>
                            <th>Total Event</th>
                            <td>{{ $peserta->registrations->count() }}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body">

                    <h4 class="fw-bold mb-4">Riwayat Event</h4>

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>Event</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($peserta->registrations as $registration)
                                <tr>

                                    <td>{{ $registration->event->nama_event }}</td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($registration->event->tanggal)->format('d M Y') }}
                                    </td>

                                    <td>
                                        @if ($registration->status == 'Pending')
                                            <span class="badge bg-warning">
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
                                        Rp {{ number_format($registration->total_bayar, 0, ',', '.') }}
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        Belum pernah mengikuti event.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection