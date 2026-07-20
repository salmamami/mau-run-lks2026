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

        <div class="d-flex gap-2">

            <a
                href="{{ route('events.edit',$event->id) }}"
                class="btn btn-warning">

                Edit Event

            </a>

            <a
                href="{{ route('events.index') }}"
                class="btn btn-outline-warning">

                ← Kembali

            </a>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-7">

            <div class="card border-0 shadow-sm rounded-4">

                <img
                    src="{{ asset('images/'.$event->image) }}"
                    class="card-img-top">

                <div class="card-body">

                    <table class="table align-middle">

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
                            <td>
                                <span class="badge bg-primary fs-6">
                                    {{ $event->kuota }}
                                </span>
                            </td>
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

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body">

                    <h4 class="fw-bold mb-4">
                        Statistik Event
                    </h4>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Total Pendaftar</span>
                        <h5 class="fw-bold">
                            {{ $event->registrations->count() }}
                        </h5>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Pending</span>

                        <h5 class="fw-bold text-warning">
                            {{ $event->registrations->where('status','Pending')->count() }}
                        </h5>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Confirmed</span>

                        <h5 class="fw-bold text-success">
                            {{ $event->registrations->where('status','Confirmed')->count() }}
                        </h5>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Rejected</span>

                        <h5 class="fw-bold text-danger">
                            {{ $event->registrations->where('status','Rejected')->count() }}
                        </h5>
                    </div>

                    <hr>

                    @php
                        $pesertaAktif =
                        $event->registrations->where('status','Pending')->count()
                        +
                        $event->registrations->where('status','Confirmed')->count();

                        $kuotaAwal = $event->kuota + $pesertaAktif;
                    @endphp

                    <div class="d-flex justify-content-between mb-3">

                        <span>Kuota Awal</span>

                        <h5 class="fw-bold">
                            {{ $kuotaAwal }}
                        </h5>

                    </div>

                    <div class="d-flex justify-content-between mb-3">

                        <span>Kuota Tersisa</span>

                        <h5 class="fw-bold text-primary">
                            {{ $event->kuota }}
                        </h5>

                    </div>

                    <div class="mb-3">

                        <span>Tingkat Keterisian</span>

                        <div class="progress mt-2" style="height:18px;">

                            <div
                                class="progress-bar bg-warning"

                                style="width:
                                {{ $kuotaAwal > 0
                                ? ($pesertaAktif/$kuotaAwal)*100
                                : 0 }}%">

                                {{ $kuotaAwal > 0
                                ? round(($pesertaAktif/$kuotaAwal)*100)
                                : 0 }}%

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <hr class="my-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold mb-0">
            Daftar Peserta
        </h3>

        <span class="badge bg-dark fs-6">
            {{ $event->registrations->count() }} Peserta
        </span>

    </div>

    @if($event->registrations->count())

    <div class="card border-0 shadow-sm rounded-4">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>Nama</th>

                        <th>Email</th>

                        <th>Status</th>

                        <th>Total Bayar</th>

                        <th>Bukti</th>

                        <th width="280">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($event->registrations as $registration)

                    <tr>

                        <td>

                            <strong>
                                {{ $registration->nama_lengkap }}
                            </strong>

                        </td>

                        <td>

                            {{ $registration->email }}

                        </td>

                        <td>

                            @if($registration->status=="Pending")

                                <span class="badge bg-warning text-dark">
                                    Pending
                                </span>

                            @elseif($registration->status=="Confirmed")

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

                            Rp {{ number_format($registration->total_bayar,0,',','.') }}

                        </td>

                        <td>

                            @if($registration->bukti_pembayaran)

                                <a
                                    href="{{ asset('storage/bukti-pembayaran/'.$registration->bukti_pembayaran) }}"
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
                                href="{{ route('admin.registrations.show',$registration->id) }}"
                                class="btn btn-warning btn-sm">

                                Detail

                            </a>

                            @if($registration->status=="Pending")

                                <form
                                    action="{{ route('admin.registrations.confirm',$registration->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        class="btn btn-success btn-sm"
                                        onclick="return confirm('Konfirmasi peserta ini?')">

                                        Approve

                                    </button>

                                </form>

                                <form
                                    action="{{ route('admin.registrations.reject',$registration->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tolak peserta ini?')">

                                        Reject

                                    </button>

                                </form>

                            @endif

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    @else

        <div class="alert alert-warning">

            Belum ada peserta pada event ini.

        </div>

    @endif

</div>

@endsection