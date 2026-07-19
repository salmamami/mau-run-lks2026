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

@endsection