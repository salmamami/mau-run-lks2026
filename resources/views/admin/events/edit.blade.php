@extends('layouts.app')

@section('title', 'Edit Event')

@section('content')

<h2 class="mb-4">Edit Event</h2>

<div class="card shadow">
    <div class="card-body">
        <form action="{{ route('events.update', $event->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Event</label>

                <input
                    type="text"
                    name="nama_event"
                    class="form-control"
                    value="{{ $event->nama_event }}">
            </div>

            <div class="mb-3">
                <label>Jenis Event</label>

                <select
                    name="event_type_id"
                    class="form-control">

                    @foreach ($eventTypes as $type)
                        <option
                            value="{{ $type->id }}"
                            {{ $event->event_type_id == $type->id ? 'selected' : '' }}>

                            {{ $type->name }}

                        </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Kota</label>

                <select
                    name="city_id"
                    class="form-control">

                    @foreach ($cities as $city)
                        <option
                            value="{{ $city->id }}"
                            {{ $event->city_id == $city->id ? 'selected' : '' }}>

                            {{ $city->name }}

                        </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label>Tanggal</label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-control"
                    value="{{ $event->tanggal }}">
            </div>

            <div class="mb-3">
                <label>Harga</label>

                <input
                    type="number"
                    name="harga"
                    class="form-control"
                    value="{{ $event->harga }}">
            </div>

            <div class="mb-3">
                <label>Kuota</label>

                <input
                    type="number"
                    name="kuota"
                    class="form-control"
                    value="{{ $event->kuota }}">
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>

                <textarea
                    name="deskripsi"
                    rows="4"
                    class="form-control">{{ $event->deskripsi }}</textarea>
            </div>

            <button class="btn btn-primary">
                Update Event
            </button>

        </form>
    </div>
</div>

@endsection