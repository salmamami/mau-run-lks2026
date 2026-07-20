<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class PesertaController extends Controller
{
    public function index()
    {
        $pesertas = User::withCount('registrations')
            ->with('registrations')
            ->where('role', 'peserta')
            ->latest()
            ->paginate(10);

        return view(
            'admin.pesertas.index',
            compact('pesertas')
        );
    }

    public function show(User $peserta)
    {
        $peserta->load([
            'registrations.event.city',
            'registrations.event.eventType'
        ]);

        return view(
            'admin.pesertas.show',
            compact('peserta')
        );
    }
}