<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\City;
use App\Models\EventType;
use App\Models\Registration;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Event::with([
            'city',
            'eventType',
            'registrations'
        ])->latest()->get();

        return view('admin.dashboard', [

            'events' => $events,

            'totalEvent' => Event::count(),

            'totalPeserta' => Registration::where(
                'status',
                'Confirmed'
            )->count(),

            'totalKota' => City::count(),

            'totalJenis' => EventType::count(),

            'pending' => Registration::where(
                'status',
                'Pending'
            )->count(),

            'confirmed' => Registration::where(
                'status',
                'Confirmed'
            )->count(),

            'rejected' => Registration::where(
                'status',
                'Rejected'
            )->count(),

            'totalPendapatan' => Registration::where(
                'status',
                'Confirmed'
            )->sum('total_bayar'),

            'latestRegistrations' => Registration::with([
                'event'
            ])
            ->latest()
            ->take(5)
            ->get(),

            'popularEvents' => Event::withCount([
                'registrations'
            ])
            ->orderByDesc('registrations_count')
            ->take(5)
            ->get(),

            'almostFullEvents' => Event::where('kuota', '<=', 50)
            ->orderBy('kuota')
            ->take(5)
            ->get(),

        ]);
    }
}