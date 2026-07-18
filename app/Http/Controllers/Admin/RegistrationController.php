<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = Registration::with([
            'event',
            'event.city',
            'event.eventType',
            'user'
        ]);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%")
                    ->orWhere('no_hp', 'like', "%{$search}%")
                    ->orWhereHas('event', function ($event) use ($search) {
                        $event->where('nama_event', 'like', "%{$search}%");
                    });
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $registrations = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $pending = Registration::where('status', 'Pending')->count();
        $confirmed = Registration::where('status', 'Confirmed')->count();
        $rejected = Registration::where('status', 'Rejected')->count();

        return view('admin.registrations.index', compact(
            'registrations',
            'pending',
            'confirmed',
            'rejected'
        ));
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