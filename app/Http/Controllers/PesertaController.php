<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class PesertaController extends Controller
{
    public function dashboard()
    {
        $registrations = Registration::with([
            'event.eventType',
            'event.city'
        ])
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

        return view('peserta.dashboard', compact('registrations'));
    }
}