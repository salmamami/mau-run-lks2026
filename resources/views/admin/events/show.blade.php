@extends('layouts.app')

@section('title','Detail Event')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold">
                {{ $event->nama_event }}
            </h2>

            <p class="text-muted">
                Detail informasi event.
            </p>
        </div>

        <a
            href="{{ route('events.index') }}"
            class="btn btn-outline-warning">

            ← Kembali

        </a>

    </div>

    <div class="row">

        <div class="col-lg-7">

            <div class="card shadow-sm border-0 rounded-4">

                <img
                    src="{{ asset('images/'.$event->image) }}"
                    class="card-img-top">

                <div class="card-body">

                    <table class="table">

                        <tr>
                            <th width="180">Nama Event</th>
                            <td>{{ $event->nama_event }}</td>
                        </tr>

                        <tr>
                            <th>Kategori</th>
                            <td>{{ $event->eventType->name }}</td>
                        </tr>

                        <tr>
                            <th>Kota</th>
                            <td>{{ $event->city->name }}</td>
                        </tr>

                        <tr>
                            <th>Tanggal</th>
                            <td>{{ \Carbon\Carbon::parse($event->tanggal)->format('d F Y') }}</td>
                        </tr>

                        <tr>
                            <th>Harga</th>
                            <td>
                                Rp {{ number_format($event->harga,0,',','.') }}
                            </td>
                        </tr>

                        <tr>
                            <th>Kuota Tersisa</th>
                            <td>{{ $event->kuota }}</td>
                        </tr>

                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $event->deskripsi }}</td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

        <div class="col-lg-5">

            <div class="card shadow-sm border-0 rounded-4">

                <div class="card-body">

                    <h4 class="fw-bold mb-4">
                        Statistik
                    </h4>

                    <div class="mb-3">
                        Total Pendaftar
                        <h3>{{ $event->registrations->count() }}</h3>
                    </div>

                    <div class="mb-3">
                        Pending
                        <h3>
                            {{ $event->registrations->where('status','Pending')->count() }}
                        </h3>
                    </div>

                    <div class="mb-3">
                        Confirmed
                        <h3 class="text-success">
                            {{ $event->registrations->where('status','Confirmed')->count() }}
                        </h3>
                    </div>

                    <div class="mb-3">
                        Rejected
                        <h3 class="text-danger">
                            {{ $event->registrations->where('status','Rejected')->count() }}
                        </h3>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<hr class="my-5">

<h3 class="fw-bold mb-4">
    Daftar Peserta
</h3>

@if ($event->registrations->count())

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Total Bayar</th>
                    <th>Bukti</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($event->registrations as $registration)

                    <tr>
                        <td>{{ $registration->nama_lengkap }}</td>

                        <td>{{ $registration->email }}</td>

                        <td>
                            @if ($registration->status == 'Pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif ($registration->status == 'Confirmed')
                                <span class="badge bg-success">Confirmed</span>
                            @else
                                <span class="badge bg-danger">Rejected</span>
                            @endif
                        </td>

                        <td>
                            Rp {{ number_format($registration->total_bayar, 0, ',', '.') }}
                        </td>

                        <td>
                            @if ($registration->bukti_pembayaran)
                                <a
                                    href="{{ asset('storage/bukti-pembayaran/' . $registration->bukti_pembayaran) }}"
                                    target="_blank"
                                    class="btn btn-sm btn-outline-primary">
                                    Lihat
                                </a>
                            @else
                                -
                            @endif
                        </td>

                        <td>
                            <a
                                href="{{ route('admin.registrations.show', $registration->id) }}"
                                class="btn btn-warning btn-sm">
                                Detail
                            </a>
                        </td>
                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

@else

    <div class="alert alert-warning">
        Belum ada peserta pada event ini.
    </div>

@endif
@endsection