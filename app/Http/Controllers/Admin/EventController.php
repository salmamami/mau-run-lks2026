<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventType;
use App\Models\City;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with([
            'eventType',
            'city'
        ])->latest()->get();

        return view(
            'admin.events.index',
            compact('events')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventTypes = EventType::all();
        $cities = City::all();

        return view('admin.events.create', compact('eventTypes', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_event' => 'required',
            'event_type_id' => 'required',
            'city_id' => 'required',
            'tanggal' => 'required|date',
            'harga' => 'required|numeric',
            'kuota' => 'required|integer',
            'deskripsi' => 'required',
        ]);

        Event::create($validate);

        return redirect()
             ->route('events.index')
             ->with('success', 'Event berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_event' => 'required',
            'event_type_id' => 'required',
            'city_id' => 'required',
            'tanggal' => 'required|date',
            'harga' => 'required|integer',
            'kuota' => 'required|integer',
            'deskripsi' => 'required',
        ]);

        $event = Event::findOrFail($id);

        $event->update($request->all());

        return redirect()
              ->route('events.index')
              ->with('success', 'Event berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return redirect()
              ->route('events.index')
              ->with('success', 'Event berhasil dihapus');
    }
}
