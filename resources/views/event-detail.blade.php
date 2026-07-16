@extends('layouts.app')

@section('title',$event->nama_event)

@section('content')

<div class="container py-5">

<div class="row g-5">

{{-- =====================================
LEFT
===================================== --}}

<div class="col-lg-8">

<img src="{{ asset('images/'.$event->image) }}"
class="event-banner">

<div class="mt-4">

<span class="badge bg-warning text-dark px-3 py-2">

{{ $event->eventType->name }}

</span>

<h1 class="fw-bold mt-3">

{{ $event->nama_event }}

</h1>

<p class="lead text-muted">

Bergabunglah bersama ratusan pelari dari berbagai kota dan rasakan pengalaman event lari yang aman, seru, dan profesional.

</p>

</div>

{{-- EVENT INFO --}}

<div class="row g-3 mt-2">

<div class="col-md-4">

<div class="info-card">

<div class="icon">📍</div>

<small>Lokasi</small>

<h6 class="fw-bold mt-2">

{{ $event->city->name }}

</h6>

</div>

</div>

<div class="col-md-4">

<div class="info-card">

<div class="icon">📅</div>

<small>Tanggal</small>

<h6 class="fw-bold mt-2">

{{ \Carbon\Carbon::parse($event->tanggal)->format('d F Y') }}

</h6>

</div>

</div>

<div class="col-md-4">

<div class="info-card">

<div class="icon">🏃</div>

<small>Kategori</small>

<h6 class="fw-bold mt-2">

{{ $event->eventType->name }}

</h6>

</div>

</div>

</div>

{{-- ABOUT --}}

<div class="description-card mt-4">

<h3 class="fw-bold mb-3">

About Event

</h3>

<p class="text-muted">

{{ $event->deskripsi }}

</p>

</div>

{{-- TIMELINE --}}

<div class="description-card mt-4">

<h3 class="fw-bold mb-4">

📅 Event Timeline

</h3>

<div class="timeline">

<div class="timeline-item">

<div class="timeline-dot bg-warning"></div>

<div>

<h6 class="fw-bold">

Registration Opens

</h6>

<p class="text-muted mb-0">

Pendaftaran peserta telah dibuka.

</p>

</div>

</div>

<div class="timeline-item">

<div class="timeline-dot bg-warning"></div>

<div>

<h6 class="fw-bold">

Registration Closes

</h6>

<p class="text-muted mb-0">

3 hari sebelum event berlangsung.

</p>

</div>

</div>

<div class="timeline-item">

<div class="timeline-dot bg-success"></div>

<div>

<h6 class="fw-bold">

Race Day

</h6>

<p class="text-muted mb-0">

{{ \Carbon\Carbon::parse($event->tanggal)->format('d F Y') }}

</p>

</div>

</div>

</div>

</div>

{{-- INCLUDED --}}

<div class="description-card mt-4">

<h3 class="fw-bold mb-4">

🎁 What's Included

</h3>

<div class="row g-3">

@php

$items=[

['👕','Exclusive Jersey'],

['🏅','Finisher Medal'],

['🎫','Race Bib'],

['📜','E-Certificate'],

['🥤','Refreshment'],

['📸','Official Documentation']

];

@endphp

@foreach($items as $item)

<div class="col-md-4">

<div class="info-card">

<div style="font-size:34px">

{{ $item[0] }}

</div>

<h5 class="mt-3">

{{ $item[1] }}

</h5>

</div>

</div>

@endforeach

</div>

</div>

{{-- WHY JOIN --}}

<div class="description-card mt-4">

<h3 class="fw-bold mb-4">

❤️ Why Join This Event?

</h3>

<div class="row">

<div class="col-md-6">

<ul class="feature-list">

<li>✅ Professional Organizer</li>

<li>✅ Safe Running Route</li>

<li>✅ Certified Medical Team</li>

<li>✅ Official Timing</li>

</ul>

</div>

<div class="col-md-6">

<ul class="feature-list">

<li>✅ Thousands of Participants</li>

<li>✅ Community Experience</li>

<li>✅ Premium Race Pack</li>

<li>✅ Amazing Finish Line</li>

</ul>

</div>

</div>

</div>

{{-- FAQ --}}

<div class="description-card mt-4">

<h3 class="fw-bold mb-4">

❓ Frequently Asked Questions

</h3>

<div class="mb-4">

<h6 class="fw-bold">

Can beginners join?

</h6>

<p class="text-muted">

Tentu. Event ini terbuka untuk semua peserta sesuai kategori yang dipilih.

</p>

</div>

<div class="mb-4">

<h6 class="fw-bold">

Will I receive a medal?

</h6>

<p class="text-muted">

Semua peserta yang berhasil menyelesaikan race akan mendapatkan Finisher Medal.

</p>

</div>

<div>

<h6 class="fw-bold">

Can I transfer my ticket?

</h6>

<p class="text-muted">

Tidak. Tiket hanya berlaku untuk peserta yang terdaftar.

</p>

</div>

</div>

</div>

{{-- =====================================
RIGHT
===================================== --}}

<div class="col-lg-4">

<div class="register-card">

<h6 class="text-muted">

Registration Fee

</h6>

<h2 class="fw-bold text-warning">

Rp {{ number_format($event->harga,0,',','.') }}

</h2>

<hr>

<div class="d-flex justify-content-between mb-3">

<span>👥 Kuota</span>

<strong>

{{ $event->kuota }}

</strong>

</div>

<div class="d-flex justify-content-between mb-3">

<span>📍 Kota</span>

<strong>

{{ $event->city->name }}

</strong>

</div>

<div class="d-flex justify-content-between mb-3">

<span>🏃 Kategori</span>

<strong>

{{ $event->eventType->name }}

</strong>

</div>

<div class="d-flex justify-content-between mb-4">

<span>📅 Tanggal</span>

<strong>

{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}

</strong>

</div>

<hr>

<p class="fw-bold">

Race Pack

</p>

<ul class="feature-list">

<li>✔ Jersey</li>

<li>✔ Race Bib</li>

<li>✔ Medal</li>

<li>✔ E-Certificate</li>

<li>✔ Refreshment</li>

</ul>

@auth

<a href="{{ route('registration.create',$event->id) }}"
class="btn btn-warning btn-register w-100 mt-4">

Register Now →

</a>

@else

<a href="/login"
class="btn btn-warning btn-register w-100 mt-4">

Login to Register

</a>

@endauth

</div>

</div>

</div>

</div>

@endsection