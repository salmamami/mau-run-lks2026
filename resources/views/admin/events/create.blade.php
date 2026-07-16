@extends('layouts.app')

@section('title', 'Tambah Event')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card border-0 shadow rounded-4 overflow-hidden">
            <div class="row g-0">
                <div class="col-lg-4 bg-warning p-5 d-flex flex-column justify-content-center">
                    <h2 class="fw-bold text-dark">
                        Tambah Event
                    </h2>

                    <p class="text-dark mt-3">
                        Lengkapi informasi event agar peserta dapat melihat dan melakukan pendaftaran.
                    </p>

                    <hr>

                    <p>✔ Upload poster event</p>
                    <p>✔ Tentukan kuota</p>
                    <p>✔ Atur harga</p>
                    <p>✔ Pilih kota</p>
                </div>

                <div class="col-lg-8 p-5">
                    <form action="{{ route('events.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="fw-semibold">
                                    Nama Event
                                </label>

                                <input
                                    type="text"
                                    name="nama_event"
                                    class="form-control form-modern">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="fw-semibold">
                                    Jenis Event
                                </label>

                                <select
                                    name="event_type_id"
                                    class="form-select form-modern">

                                    @foreach ($eventTypes as $type)
                                        <option value="{{ $type->id }}">
                                            {{ $type->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="fw-semibold">
                                    Kota
                                </label>

                                <select
                                    name="city_id"
                                    class="form-select form-modern">

                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">
                                            {{ $city->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="fw-semibold">
                                    Tanggal
                                </label>

                                <input
                                    type="date"
                                    name="tanggal"
                                    class="form-control form-modern">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="fw-semibold">
                                    Harga
                                </label>

                                <input
                                    type="number"
                                    name="harga"
                                    class="form-control form-modern">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="fw-semibold">
                                    Kuota
                                </label>

                                <input
                                    type="number"
                                    name="kuota"
                                    class="form-control form-modern">
                            </div>

                            <div class="col-12 mb-4">
                                <label class="fw-semibold">
                                    Poster Event
                                </label>

                                <input
                                    type="file"
                                    name="image"
                                    class="form-control form-modern">
                            </div>

                            <div class="col-12 mb-4">
                                <label class="fw-semibold">
                                    Deskripsi
                                </label>

                                <textarea
                                    rows="5"
                                    name="deskripsi"
                                    class="form-control form-modern"></textarea>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-warning rounded-pill px-5 py-3 fw-bold">
                                    Simpan Event
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection