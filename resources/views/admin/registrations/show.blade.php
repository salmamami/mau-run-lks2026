@extends('layouts.app')

@section('title', 'Detail Peserta')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Detail Peserta
            </h2>

            <p class="text-muted mb-0">
                Informasi lengkap pendaftaran peserta.
            </p>
        </div>

        <a
            href="{{ route('admin.registrations.index') }}"
            class="btn btn-outline-warning">
            ← Kembali
        </a>

    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-5">

            <div class="row g-5">

                <div class="col-md-6">

                    <h5 class="fw-bold mb-4">
                        Data Peserta
                    </h5>

                    <table class="table">

                        <tr>
                            <th width="180">Nama</th>
                            <td>{{ $registration->nama_lengkap }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $registration->email }}</td>
                        </tr>

                        <tr>
                            <th>NIK</th>
                            <td>{{ $registration->nik }}</td>
                        </tr>

                        <tr>
                            <th>No HP</th>
                            <td>{{ $registration->no_hp }}</td>
                        </tr>

                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $registration->jenis_kelamin }}</td>
                        </tr>

                        <tr>
                            <th>Ukuran Jersey</th>
                            <td>{{ $registration->ukuran_jersey }}</td>
                        </tr>

                    </table>

                </div>

                <div class="col-md-6">

                    <h5 class="fw-bold mb-4">
                        Data Event
                    </h5>

                    <table class="table">

                        <tr>
                            <th width="180">Event</th>
                            <td>{{ $registration->event->nama_event }}</td>
                        </tr>

                        <tr>
                            <th>Kota</th>
                            <td>{{ $registration->event->city->name }}</td>
                        </tr>

                        <tr>
                            <th>Kategori</th>
                            <td>{{ $registration->event->eventType->name }}</td>
                        </tr>

                        <tr>
                            <th>Harga</th>
                            <td>
                                Rp {{ number_format($registration->event->harga,0,',','.') }}
                            </td>
                        </tr>

                        <tr>
                            <th>Diskon</th>
                            <td>
                                Rp {{ number_format($registration->diskon,0,',','.') }}
                            </td>
                        </tr>

                        <tr>
                            <th>Total Bayar</th>
                            <td class="fw-bold text-warning">
                                Rp {{ number_format($registration->total_bayar,0,',','.') }}
                            </td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>

                                @if($registration->status == 'Pending')
                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>
                                @elseif($registration->status == 'Confirmed')
                                    <span class="badge bg-success">
                                        Confirmed
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Rejected
                                    </span>
                                @endif

                            </td>
                        </tr>

                    </table>

                    @if($registration->status == 'Pending')

                        <div class="d-flex gap-3 mt-4">

                            <form
                                action="{{ route('admin.registrations.confirm', $registration) }}"
                                method="POST">

                                @csrf
                                @method('PATCH')

                                <button class="btn btn-success">
                                    Confirm Peserta
                                </button>

                            </form>

                            <form
                                action="{{ route('admin.registrations.reject', $registration) }}"
                                method="POST">

                                @csrf
                                @method('PATCH')

                                <button class="btn btn-danger">
                                    Reject Peserta
                                </button>

                            </form>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection