@extends('layouts.app')

@section('title', 'Tambah Event')

@section('content')

<h2 class="mb-4">Tambah Event</h2>

<div class="card shadow-sm">

    <div class="card-body">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form action="{{ route('events.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Nama Event</label>

                <input type="text"
                       name="nama_event"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Jenis Event</label>

                <select name="event_type_id"
                        class="form-control">

                    @foreach($eventTypes as $type)

                        <option value="{{ $type->id }}">
                            {{ $type->name }}
                        </option>

                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Kota</label>

                <select name="city_id"
                        class="form-control">

                    @foreach($cities as $city)

                        <option value="{{ $city->id }}">
                            {{ $city->name }}
                        </option>

                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>

                <input type="date"
                       name="tanggal"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Harga</label>

                <input type="number"
                       name="harga"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Kuota</label>

                <input type="number"
                       name="kuota"
                       class="form-control">
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>

                <textarea name="deskripsi"
                          class="form-control"
                          rows="4"></textarea>
            </div>

            <button class="btn btn-primary">
                Simpan Event
            </button>

        </form>

    </div>

</div>

@endsection