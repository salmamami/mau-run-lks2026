@extends('layouts.app')

@section('title','Detail Event')

@section('content')

<div class="card shadow">

<div class="card-body">

<h2>

{{ $event->nama_event }}

</h2>

<hr>

<p>

<b>Jenis Event</b>

<br>

{{ $event->eventType->name }}

</p>

<p>

<b>Kota</b>

<br>

{{ $event->city->name }}

</p>

<p>

<b>Tanggal</b>

<br>

{{ \Carbon\Carbon::parse($event->tanggal)->format('d F Y') }}

</p>

<p>

<b>Harga</b>

<br>

Rp {{ number_format($event->harga,0,',','.') }}

</p>

<p>

<b>Kuota</b>

<br>

{{ number_format($event->kuota) }}

</p>

<p>

<b>Deskripsi</b>

<br>

{{ $event->deskripsi }}

</p>

@if(Auth::check())

<a href="{{ route('registration.create',$event->id) }}"
class="btn btn-primary">

Daftar Sekarang

</a>

@else

<a href="{{ route('login') }}"
class="btn btn-primary">

Login untuk Mendaftar

</a>

@endif

</div>

</div>

@endsection