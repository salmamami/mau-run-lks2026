@extends('layouts.app')

@section('title', 'Pendaftaran Event')

@section('content')

<h2 class="mb-4">Pendaftaran Event</h2>

<div class="card shadow-sm">

    <div class="card-body">

        <h4>{{ $event->nama_event }}</h4>

        <p>
            {{ $event->eventType->name }} |
            {{ $event->city->name }}
        </p>

        <p>
            Harga :
            <strong>
                Rp {{ number_format($event->harga,0,',','.') }}
            </strong>
        </p>

        <hr>

        <form action="{{ route('registration.store',$event->id) }}"
              method="POST">

            @csrf

            <div class="mb-3">
                <label>Nama Lengkap</label>

                <input type="text"
                       name="nama_lengkap"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Email</label>

                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ Auth::user()->email }}"
                       required>
            </div>

            <div class="mb-3">
                <label>No HP</label>

                <input type="text"
                       name="no_hp"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">

                <label>Jenis Kelamin</label>

                <select name="jenis_kelamin"
                        class="form-control">

                    <option value="Laki-laki">
                        Laki-laki
                    </option>

                    <option value="Perempuan">
                        Perempuan
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label>Ukuran Jersey</label>

                <select name="ukuran_jersey"
                        class="form-control">

                    <option>S</option>
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                    <option>XXL</option>

                </select>

            </div>

            <div class="mb-3">

                <label>Kode Kupon</label>

                <input type="text"
                       name="kode_kupon"
                       class="form-control"
                       placeholder="D-10 / D-20 / D-50">

            </div>

            <button class="btn btn-success">

                Daftar Event

            </button>

        </form>

    </div>

</div>

@endsection