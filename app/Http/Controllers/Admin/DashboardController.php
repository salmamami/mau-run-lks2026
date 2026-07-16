<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Registration;
use App\Models\City;
use App\Models\EventType;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvent = Event::count();
        $totalPeserta = Registration::count();
        $totalKota = City::count();
        $totalJenis = EventType::count();
        
        $events = Event::with([
            'eventType',
            'city',
            'registrations'
        ])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalEvent',
            'totalPeserta',
            'totalKota',
            'totalJenis',
            'events'
        ));
    }
}