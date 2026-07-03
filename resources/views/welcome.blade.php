@extends('layouts.app')

@section('title','MAU RUN')

@section('content')

<div class="text-center mb-5">

    <h1 class="fw-bold">
        MAU RUN
    </h1>

    <p>
        Temukan Event Lari Favoritmu
    </p>

    @guest

        <a href="{{ route('login') }}"
           class="btn btn-primary">
            Login
        </a>

        <a href="{{ route('register') }}"
           class="btn btn-outline-primary">
            Register
        </a>

    @endguest

</div>

<div class="row">

@foreach($events as $event)

<div class="col-md-4 mb-4">

<div class="card shadow h-100">

<div class="card-body">

<h5>

{{ $event->nama_event }}

</h5>

<p>

{{ $event->eventType->name }}

</p>

<p>

{{ $event->city->name }}

</p>

<p>

{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}

</p>

<h5>

Rp {{ number_format($event->harga,0,',','.') }}

</h5>

<a href="{{ route('event.detail',$event->id) }}"
class="btn btn-success">

Lihat Detail

</a>

</div>

</div>

</div>

@endforeach

</div>

@endsection