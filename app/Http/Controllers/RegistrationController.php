<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function create($id)
    {
        $event = Event::findOrFail($id);

        return view('registrations.create', compact('event'));
    }

    public function store(RegistrationRequest $request, $id)
    {
        $event = Event::findOrFail($id);

        // Cek kuota
        if ($event->kuota <= 0) {
            return back()
                ->withInput()
                ->with('error', 'Kuota event sudah habis.');
        }

        // Cek email
        $emailExists = Registration::where('event_id', $event->id)
            ->where('email', $request->email)
            ->exists();

        if ($emailExists) {
            return back()
                ->withInput()
                ->with('error', 'Email sudah terdaftar pada event ini.');
        }

        // Cek NIK
        $nikExists = Registration::where('event_id', $event->id)
            ->where('nik', $request->nik)
            ->exists();

        if ($nikExists) {
            return back()
                ->withInput()
                ->with('error', 'NIK sudah digunakan pada event ini.');
        }

        // Cek Nomor HP
        $phoneExists = Registration::where('event_id', $event->id)
            ->where('no_hp', $request->no_hp)
            ->exists();

        if ($phoneExists) {
            return back()
                ->withInput()
                ->with('error', 'Nomor HP sudah digunakan pada event ini.');
        }

        $diskon = 0;

        switch ($request->kode_kupon) {
            case 'D-10':
                $diskon = 10000;
                break;

            case 'D-20':
                $diskon = 20000;
                break;

            case 'D-50':
                $diskon = 50000;
                break;
        }

        Registration::create([
            'user_id'         => Auth::id(),
            'event_id'        => $event->id,
            'nama_lengkap'    => $request->nama_lengkap,
            'email'           => $request->email,
            'nik'             => $request->nik,
            'no_hp'           => $request->no_hp,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'ukuran_jersey'   => $request->ukuran_jersey,
            'kode_kupon'      => $request->kode_kupon,
            'diskon'          => $diskon,
            'total_bayar'     => $event->harga - $diskon,
            'status'          => 'Pending',
        ]);

        $event->decrement('kuota');

        return redirect('/peserta/dashboard')
            ->with('success', 'Pendaftaran berhasil.');
    }

    public function show($id)
    {
        $registration = Registration::with([
            'event.city',
            'event.eventType'
        ])->findOrFail($id);

        if ($registration->user_id != Auth::id()) {
            abort(403);
        }

        return view('registrations.show', compact('registration'));
    }
}