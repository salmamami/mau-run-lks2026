@extends('layouts.app')

@section('title', 'Kelola Event')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-5">
    <div>
        <h2 class="fw-bold mb-1">
            Kelola Event
        </h2>

        <p class="text-muted mb-0">
            Kelola seluruh event Mau Run.
        </p>
    </div>

    <a
        href="{{ route('events.create') }}"
        class="btn btn-warning px-4">

        + Tambah Event

    </a>
</div>

<div class="row">

    @forelse ($events as $event)

        <div class="col-lg-4 mb-4">
            <div class="event-admin-card">

                <img
                    src="{{ asset('images/' . $event->image) }}"
                    class="event-admin-image">

                <div class="p-4">

                    <span class="badge bg-warning text-dark">
                        {{ $event->eventType->name }}
                    </span>

                    <h4 class="mt-3 fw-bold">
                        {{ $event->nama_event }}
                    </h4>

                    <p class="text-muted mb-2">
                        📍 {{ $event->city->name }}
                    </p>

                    <p class="text-muted mb-2">
                        📅 {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                    </p>

                    <p class="text-muted mb-3">
                        👥 Kuota :
                        <strong>{{ $event->kuota }}</strong>
                    </p>

                    <h5 class="fw-bold text-warning">
                        Rp {{ number_format($event->harga, 0, ',', '.') }}
                    </h5>

                    <div class="d-flex gap-2 mt-4">

                        <a
                            href="{{ route('events.show', $event->id) }}"
                            class="btn btn-outline-warning w-100">

                            Detail

                        </a>
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
                                onclick="return confirm('Hapus event ini?')"
                                class="btn btn-outline-danger w-100">

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

                <h4>
                    Belum ada event.
                </h4>

                <a
                    href="{{ route('events.create') }}"
                    class="btn btn-warning mt-3">

                    Tambah Event

                </a>

            </div>
        </div>

    @endforelse

</div>

<div class="mt-4 d-flex justify-content-center">
    {{ $events->links() }}
</div>

@endsection