<?php

namespace App\Http\Controllers;

use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::with([
            'eventType',
            'city'
        ])->latest()->get();

        return view('welcome', compact('events'));
    }
}