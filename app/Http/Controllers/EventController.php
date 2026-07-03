<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function show($id)
    {
        $event = Event::with([
            'eventType',
            'city'
        ])->findOrFail($id);

        return view('event-detail', compact('event'));
    }
}