@extends('layouts.app')

@section('title', 'Registrasi Event')

@section('content')

<div class="container py-5">
    <div class="row g-5">

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-5">

                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill mb-3">
                        REGISTRATION FORM
                    </span>

                    <h2 class="fw-bold mb-2">
                        {{ $event->nama_event }}
                    </h2>

                    <p class="text-muted mb-5">
                        Pastikan seluruh data yang kamu isi sudah benar sebelum melakukan pendaftaran.
                    </p>

                    @if(session('error'))
                        <div class="alert alert-danger rounded-3">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('registration.store', $event->id) }}" method="POST">
                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">Nama Lengkap</label>

                                <input
                                    type="text"
                                    name="nama_lengkap"
                                    class="form-control form-modern"
                                    value="{{ Auth::user()->name }}"
                                    readonly>

                                @error('nama_lengkap')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">Email</label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control form-modern"
                                    value="{{ Auth::user()->email }}"
                                    readonly>

                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">NIK</label>

                                <input
                                    type="text"
                                    name="nik"
                                    class="form-control form-modern"
                                    value="{{ Auth::user()->nik }}"
                                    readonly>

                                @error('nik')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">No HP</label>

                                <input
                                    type="text"
                                    name="no_hp"
                                    class="form-control form-modern"
                                    value="{{ Auth::user()->no_hp }}"
                                    readonly>

                                @error('no_hp')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">Jenis Kelamin</label>

                                <select
                                    name="jenis_kelamin"
                                    class="form-select form-modern"
                                    required>

                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki
                                    </option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>

                                </select>

                                @error('jenis_kelamin')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold">Ukuran Jersey</label>

                                <select
                                    name="ukuran_jersey"
                                    class="form-select form-modern"
                                    required>

                                    <option value="">Pilih Ukuran</option>
                                    <option value="S" {{ old('ukuran_jersey') == 'S' ? 'selected' : '' }}>S</option>
                                    <option value="M" {{ old('ukuran_jersey') == 'M' ? 'selected' : '' }}>M</option>
                                    <option value="L" {{ old('ukuran_jersey') == 'L' ? 'selected' : '' }}>L</option>
                                    <option value="XL" {{ old('ukuran_jersey') == 'XL' ? 'selected' : '' }}>XL</option>
                                    <option value="XXL" {{ old('ukuran_jersey') == 'XXL' ? 'selected' : '' }}>XXL</option>

                                </select>

                                @error('ukuran_jersey')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label fw-semibold">Kode Kupon</label>

                                <input
                                    type="text"
                                    name="kode_kupon"
                                    class="form-control form-modern"
                                    placeholder="Opsional"
                                    value="{{ old('kode_kupon') }}">

                                <small class="text-muted">
                                    Gunakan kode D-10, D-20, atau D-50 jika memiliki kupon.
                                </small>

                                @error('kode_kupon')
                                    <small class="text-danger d-block">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-warning btn-register w-100">
                            Konfirmasi Pendaftaran
                        </button>

                    </form>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="register-card">

                <small class="text-muted">Ringkasan Event</small>

                <h3 class="fw-bold mt-2">
                    {{ $event->nama_event }}
                </h3>

                <hr>

                <div class="d-flex justify-content-between mb-3">
                    <span>📍 Kota</span>
                    <strong>{{ $event->city->name }}</strong>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <span>📅 Tanggal</span>
                    <strong>{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}</strong>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <span>🏃 Kategori</span>
                    <strong>{{ $event->eventType->name }}</strong>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <span>👥 Sisa Kuota</span>
                    <strong>{{ $event->kuota }}</strong>
                </div>

                <hr>

                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Total</h5>

                    <h3 class="text-warning fw-bold mb-0">
                        Rp {{ number_format($event->harga, 0, ',', '.') }}
                    </h3>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection