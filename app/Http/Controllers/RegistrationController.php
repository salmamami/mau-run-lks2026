<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function create($id)
    {
        $event = Event::findOrFail($id);

        return view('registrations.create', compact('event'));
    }

    public function store(Request $request, $id)
    {        
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'ukuran_jersey' => 'required',
        ]);

        $event = Event::findOrFail($id);

        if ($event->kuota <= 0) {
            return back()->with('error', 'Kuota sudah habis.');
        }

        $diskon = 0;

        if ($request->kode_kupon == 'D-10') {
            $diskon = 10000;
        } elseif ($request->kode_kupon == 'D-20') {
            $diskon = 20000;
        } elseif ($request->kode_kupon == 'D-50') {
            $diskon = 50000;
        }

        Registration::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'ukuran_jersey' => $request->ukuran_jersey,
            'kode_kupon' => $request->kode_kupon,
            'diskon' => $diskon,
            'total_bayar' => $event->harga - $diskon,
        ]);

        $event->decrement('kuota');

        return redirect('/peserta/dashboard')
            ->with('success', 'Pendaftaran berhasil.');
    }
}