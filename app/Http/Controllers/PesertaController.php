<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class PesertaController extends Controller
{
    public function dashboard()
    {
        $registrations = auth()->user()
            ->registrations()
            ->with('event.eventType', 'event.city')
            ->latest()
            ->get();

       return view('peserta.dashboard',[
        'registrations'=>$registrations,
        'totalRegistration'=>$registrations->count(),
        'upcoming'=>$registrations->count(),
       ]);
    }
}