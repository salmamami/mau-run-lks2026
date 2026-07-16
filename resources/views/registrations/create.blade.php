<form action="{{ route('registration.store', $event->id) }}" method="POST">
    @csrf

    <div class="row">

        <div class="col-md-6 mb-4">
            <label class="form-label">Nama Lengkap</label>

            <input type="text"
                name="nama_lengkap"
                class="form-control form-control-lg"
                value="{{ old('nama_lengkap', Auth::user()->name) }}"
                required>

            @error('nama_lengkap')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-md-6 mb-4">
            <label class="form-label">Email</label>

            <input type="email"
                name="email"
                class="form-control form-control-lg"
                value="{{ old('email', Auth::user()->email) }}"
                required>

            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-md-6 mb-4">
            <label class="form-label">NIK</label>

            <input type="text"
                name="nik"
                class="form-control form-control-lg"
                maxlength="16"
                placeholder="Masukkan NIK"
                value="{{ old('nik') }}"
                required>

            @error('nik')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-md-6 mb-4">
            <label class="form-label">No HP</label>

            <input type="text"
                name="no_hp"
                class="form-control form-control-lg"
                placeholder="08xxxxxxxxxx"
                value="{{ old('no_hp') }}"
                required>

            @error('no_hp')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-md-6 mb-4">
            <label class="form-label">Jenis Kelamin</label>

            <select name="jenis_kelamin"
                class="form-select form-select-lg"
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
            <label class="form-label">Ukuran Jersey</label>

            <select name="ukuran_jersey"
                class="form-select form-select-lg"
                required>

                <option value="">Pilih Ukuran</option>
                <option value="S" {{ old('ukuran_jersey') == 'S' ? 'selected' : '' }}>S</option>
                <option value="M" {{ old('ukuran_jersey') == 'M' ? 'selected' : '' }}>M</option>
                <option value="L" {{ old('ukuran_jersey') == 'L' ? 'selected' : '' }}>L</option>
                <option value="XL" {{ old('ukuran_jersey') == 'XL' ? 'selected' : '' }}>XL</option>

            </select>

            @error('ukuran_jersey')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-md-12 mb-4">
            <label class="form-label">Kode Kupon</label>

            <input type="text"
                name="kode_kupon"
                class="form-control form-control-lg"
                placeholder="Opsional"
                value="{{ old('kode_kupon') }}">

            @error('kode_kupon')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

    </div>

    <button type="submit" class="btn btn-warning btn-lg w-100 fw-bold rounded-3">
        Konfirmasi Pendaftaran
    </button>

</form>