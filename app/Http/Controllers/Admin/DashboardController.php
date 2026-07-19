<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventType;
use App\Models\City;
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

        $latestRegistrations = Registration::with([
            'event',
            'user'
        ])
        ->latest()
        ->take(5)
        ->get();

        $almostFullEvents = Event::orderBy('kuota')
            ->take(5)
            ->get();

        return view('admin.dashboard', [

            'events' => $events,

            'latestRegistrations' => $latestRegistrations,

            'almostFullEvents' => $almostFullEvents,

            'totalEvent' => Event::count(),

            'totalPeserta' => Registration::where('status','Confirmed')->count(),

            'pendingPeserta' => Registration::where('status','Pending')->count(),

            'totalKota' => City::count(),

            'totalJenis' => EventType::count(),

            'totalKuota' => Event::sum('kuota')

        ]);
    }
}