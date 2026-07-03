@extends('layouts.app')

@section('title','Dashboard Admin')

@section('content')

<h2 class="mb-4">
    Dashboard Admin
</h2>

<div class="mb-4">

    <a href="{{ route('events.create') }}" class="btn btn-primary">
        + Tambah Event
    </a>

    <a href="{{ route('events.index') }}" class="btn btn-outline-primary">
        Kelola Event
    </a>

</div>

<div class="row">

    <div class="col-md-3 mb-3">

        <div class="card shadow">

            <div class="card-body text-center">

                <h5>Total Event</h5>

                <h2>{{ $totalEvent }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-3">

        <div class="card shadow">

            <div class="card-body text-center">

                <h5>Total Peserta</h5>

                <h2>{{ $totalPeserta }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-3">

        <div class="card shadow">

            <div class="card-body text-center">

                <h5>Total Kota</h5>

                <h2>{{ $totalKota }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-3">

        <div class="card shadow">

            <div class="card-body text-center">

                <h5>Jenis Event</h5>

                <h2>{{ $totalJenis }}</h2>

            </div>

        </div>

    </div>

</div>

<div class="card shadow">

    <div class="card-header">

        <strong>Daftar Event</strong>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th>Nama Event</th>

                    <th>Jenis</th>

                    <th>Kota</th>

                    <th>Tanggal</th>

                    <th>Harga</th>

                    <th>Kuota Awal</th>

                    <th>Terdaftar</th>

                    <th>Sisa Kuota</th>

                </tr>

            </thead>

            <tbody>

            @foreach($events as $event)

                <tr>

                    <td>{{ $event->nama_event }}</td>

                    <td>{{ $event->eventType->name }}</td>

                    <td>{{ $event->city->name }}</td>

                    <td>{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}</td>

                    <td>Rp {{ number_format($event->harga,0,',','.') }}</td>

                    <td>{{ number_format($event->kuota + $event->registrations->count()) }}</td>

                    <td>{{ $event->registrations->count() }}</td>

                    <td>{{ number_format($event->kuota) }}</td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection