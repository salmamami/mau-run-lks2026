@extends('layouts.app')

@section('title', 'Kelola Event')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <h2>Kelola Event</h2>

    <a href="{{ route('events.create') }}"
       class="btn btn-primary">
        + Tambah Event
    </a>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table">

            <thead>
                <tr>
                    <th>Nama Event</th>
                    <th>Jenis</th>
                    <th>Kota</th>
                    <th>Tanggal</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($events as $event)

                <tr>

                    <td>{{ $event->nama_event }}</td>

                    <td>
                        {{ $event->eventType->name }}
                    </td>

                    <td>
                        {{ $event->city->name }}
                    </td>

                    <td>
                        {{ $event->tanggal }}
                    </td>

                    <td>
                        Rp {{ number_format($event->harga) }}
                    </td>

                    <td>

                    <a href="{{ route('events.edit', $event->id) }}"
                        class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('events.destroy', $event->id) }}"
                    method="POST" class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm"
                    onclick="return confirm('Hapus event ini?')">
                    Hapus
                    </button>

                    </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="6"
                        class="text-center">

                        Belum ada event

                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection