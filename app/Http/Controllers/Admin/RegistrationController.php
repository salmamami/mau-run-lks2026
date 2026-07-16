<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with([
            'event',
            'event.city',
            'event.eventType',
            'user'
        ])
        ->latest()
        ->paginate(10);

        return view('admin.registrations.index', compact('registrations'));
    }

    public function confirm(Registration $registration)
    {
        $registration->update([
            'status' => 'Confirmed'
        ]);

        return back()->with('success', 'Peserta berhasil dikonfirmasi.');
    }

    public function reject(Registration $registration)
    {
        $registration->update([
            'status' => 'Rejected'
        ]);

        return back()->with('success', 'Pendaftaran berhasil ditolak.');
    }
}