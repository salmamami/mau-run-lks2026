<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventType;
use App\Models\City;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with([
            'eventType',
            'city'
        ])
        ->latest()
        ->paginate(9);

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $eventTypes = EventType::all();
        $cities = City::all();

        return view('admin.events.create', compact(
            'eventTypes',
            'cities'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_event'    => 'required|string|max:255',
            'event_type_id' => 'required|exists:event_types,id',
            'city_id'       => 'required|exists:cities,id',
            'tanggal'       => 'required|date',
            'harga'         => 'required|numeric',
            'kuota'         => 'required|integer|min:1',
            'deskripsi'     => 'required',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {

            $filename = time() . '.' . $request->image->extension();
            $request->image->move(
                public_path('images'),
                $filename
            );

            $data['image'] = $filename;
        }

        Event::create($data);

        return redirect()
            ->route('events.index')
            ->with('success', 'Event berhasil ditambahkan.');
    }

    public function show($id)
    {
         $event = Event::with([
        'city',
        'eventType',
        'registrations'
    ])->findOrFail($id);

    $confirmed = $event->registrations
        ->where('status', 'Confirmed')
        ->count();

    $pending = $event->registrations
        ->where('status', 'Pending')
        ->count();

    $rejected = $event->registrations
        ->where('status', 'Rejected')
        ->count();

    $totalPendapatan = $event->registrations
        ->where('status', 'Confirmed')
        ->sum('total_bayar');

    return view(
        'admin.events.show',
        compact(
            'event',
            'confirmed',
            'pending',
            'rejected',
            'totalPendapatan'
        )
    );
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $eventTypes = EventType::all();
        $cities = City::all();

        return view('admin.events.edit', compact(
            'event',
            'eventTypes',
            'cities'
        ));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama_event'    => 'required|string|max:255',
            'event_type_id' => 'required|exists:event_types,id',
            'city_id'       => 'required|exists:cities,id',
            'tanggal'       => 'required|date',
            'harga'         => 'required|numeric',
            'kuota'         => 'required|integer|min:1',
            'deskripsi'     => 'required',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $event = Event::findOrFail($id);

        if ($request->hasFile('image')) {

            if ($event->image && file_exists(public_path('images/' . $event->image))) {
                unlink(public_path('images/' . $event->image));
            }

            $filename = time() . '.' . $request->image->extension();
            $request->image->move(
                public_path('images'),
                $filename
            );
            $data['image'] = $filename;
        }

        $event->update($data);

        return redirect()
            ->route('events.index')
            ->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->image && file_exists(public_path('images/' . $event->image))) {
            unlink(public_path('images/' . $event->image));
        }

        $event->delete();

        return redirect()
            ->route('events.index')
            ->with('success', 'Event berhasil dihapus.');
    }
}