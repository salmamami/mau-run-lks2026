@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class="container py-5">

    <div class="hero-dashboard mb-5">

        <div>

            <h2>

                Hi, {{ auth()->user()->name }} 👋

            </h2>

            <p>

                Ready for your next finish line?

            </p>

        </div>

        <a href="/"
           class="btn btn-warning">

            Browse Event

        </a>

    </div>

    <div class="row mb-5">

        <div class="col-md-4">

            <div class="stats-card">

                <h5>{{ $totalRegistration }}</h5>

                <small>Registered Event</small>

            </div>

        </div>

        <div class="col-md-4">

            <div class="stats-card">

                <h5>{{ $upcoming }}</h5>

                <small>Upcoming</small>

            </div>

        </div>

        <div class="col-md-4">

            <div class="stats-card">

                <h5>0</h5>

                <small>Completed</small>

            </div>

        </div>

    </div>

    <h3 class="mb-4">

        My Events

    </h3>

    <div class="row">

        @forelse($registrations as $registration)

        @php

            $event = $registration->event;

        @endphp

        <div class="col-lg-6 mb-4">

            <div class="participant-event-card">

                <img src="{{ asset('images/'.$event->image) }}"
                class="participant-event-image">

                <div class="p-4">

                    <span class="badge bg-warning text-dark">

                        {{ $event->eventType->name }}

                    </span>

                    <h4 class="mt-3">

                        {{ $event->nama_event }}

                    </h4>

                    <p class="text-muted">

                        📍 {{ $event->city->name }}

                    </p>

                    <p class="text-muted">

                        📅 {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}

                    </p>

                    <a href="{{ route('registration.show',$registration->id) }}"
                    class="btn btn-warning w-100">

                        View Detail

                    </a>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="empty-card">

                <h4>

                    You haven't joined any event yet.

                </h4>

                <a href="/"
                   class="btn btn-warning mt-3">

                    Explore Event

                </a>

            </div>

        </div>

        @endforelse

    </div>

</div>

@endsection