@extends('layouts.app')

@section('title', 'Mau Run')

@section('content')

{{-- ================= HERO ================= --}}

<section class="landing-hero">
    <div class="container">
        <div class="row align-items-center gy-5">

            <div class="col-lg-6">

                <span class="hero-badge">
                    🏃 Indonesia Running Platform
                </span>

                <h1 class="hero-title mt-4">
                    Find Your Next
                    <span>Running Event</span>
                </h1>

                <p class="hero-subtitle mt-4">
                    Mau Run membantu kamu menemukan event lari terbaik di berbagai kota.
                    Registrasi online lebih cepat, praktis, dan aman.
                </p>

                <div class="hero-buttons mt-4">
                    <a href="#events" class="btn btn-warning btn-lg">
                        Explore Events
                    </a>

                    @guest
                        <a href="{{ route('register') }}" class="btn btn-outline-warning btn-lg">
                            Join Now
                        </a>
                    @endguest
                </div>

                <div class="row mt-5 g-3">

    <div class="col-4">
        <div class="hero-stat">
            <h3>{{ $events->count() }}+</h3>
            <p>Events</p>
        </div>
    </div>

    <div class="col-4">
        <div class="hero-stat">
            <h3>500+</h3>
            <p>Participants</p>
        </div>
    </div>

    <div class="col-4">
        <div class="hero-stat">
            <h3>10+</h3>
            <p>Cities</p>
        </div>
    </div>

</div>
            </div>

            <div class="col-lg-6">

                <div class="hero-image-wrapper">

                    <div class="hero-circle"></div>

                    <img src="{{ asset('images/hero.jpg') }}"
                         class="hero-image"
                         alt="Runner">

                </div>

            </div>

        </div>
    </div>
</section>

{{-- ================= UPCOMING EVENTS ================= --}}

<section id="events" class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Upcoming Events</h2>

            <p class="text-muted">
                Pilih event favoritmu dan mulai perjalanan lari yang menyenangkan.
            </p>
        </div>

        <div class="row g-4">

            @forelse ($events as $event)

                <div class="col-lg-4 col-md-6">

                    <div class="event-card h-100">

                        <img src="{{ asset('images/' . ($event->image ?: 'default.png')) }}"
                             alt="{{ $event->nama_event }}"
                             class="event-cover">

                        <div class="p-4">

                            <span class="badge-category">
                                {{ $event->eventType->name }}
                            </span>

                            <h4 class="fw-bold mt-3">
                                {{ $event->nama_event }}
                            </h4>

                            <p class="text-muted mb-2">
                                📍 {{ $event->city->name }}
                            </p>

                            <p class="text-muted mb-3">
                                📅 {{ \Carbon\Carbon::parse($event->tanggal)->format('d F Y') }}
                            </p>

                            <div class="d-flex justify-content-between align-items-center">

                                <div>
                                    <small class="text-muted">
                                        Registration Fee
                                    </small>

                                    <h5 class="fw-bold text-warning mb-0">
                                        Rp {{ number_format($event->harga, 0, ',', '.') }}
                                    </h5>
                                </div>

                                <a href="{{ route('event.detail', $event->id) }}"
                                   class="btn btn-warning">
                                    Detail
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="empty-card">

                        <h3>Belum Ada Event</h3>

                        <p class="text-muted">
                            Nantikan event terbaru dari Mau Run.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>
    </div>
</section>

{{-- ================= WHY CHOOSE ================= --}}

<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Why Choose Mau Run?</h2>

            <p class="text-muted">
                Kami membantu kamu menemukan event lari terbaik dengan proses registrasi yang cepat dan mudah.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-lg-4">
                <div class="info-card h-100">
                    <div class="display-5 mb-3">🏃</div>

                    <h4 class="fw-bold">Many Events</h4>

                    <p class="text-muted mb-0">
                        Berbagai pilihan event mulai dari Fun Run hingga Full Marathon.
                    </p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="info-card h-100">
                    <div class="display-5 mb-3">⚡</div>

                    <h4 class="fw-bold">Easy Registration</h4>

                    <p class="text-muted mb-0">
                        Daftar event hanya dalam beberapa langkah tanpa proses yang rumit.
                    </p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="info-card h-100">
                    <div class="display-5 mb-3">🏅</div>

                    <h4 class="fw-bold">Complete Race Pack</h4>

                    <p class="text-muted mb-0">
                        Dapatkan jersey, race bib, finisher medal, e-certificate, dan refreshment.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- ================= HOW IT WORKS ================= --}}

<section class="py-5 bg-white rounded-4">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">How It Works</h2>

            <p class="text-muted">
                Hanya perlu tiga langkah untuk mengikuti event favoritmu.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-lg-4">
                <div class="info-card h-100">
                    <div class="display-5 mb-3">🔍</div>

                    <h4 class="fw-bold">Browse Event</h4>

                    <p class="text-muted mb-0">
                        Cari event berdasarkan kota dan kategori yang kamu inginkan.
                    </p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="info-card h-100">
                    <div class="display-5 mb-3">📝</div>

                    <h4 class="fw-bold">Register</h4>

                    <p class="text-muted mb-0">
                        Isi data peserta, pilih ukuran jersey, lalu selesaikan pendaftaran.
                    </p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="info-card h-100">
                    <div class="display-5 mb-3">🎉</div>

                    <h4 class="fw-bold">Enjoy The Race</h4>

                    <p class="text-muted mb-0">
                        Datang ke lokasi event dan nikmati pengalaman berlari bersama komunitas.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- ================= TESTIMONIAL ================= --}}

<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">What Runners Say</h2>

            <p class="text-muted">
                Pengalaman peserta yang telah mengikuti event melalui Mau Run.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-lg-4">
                <div class="card h-100 p-4">
                    <h5 class="fw-bold">⭐⭐⭐⭐⭐</h5>

                    <p class="text-muted mt-3">
                        Registrasinya gampang banget. Tinggal daftar, datang saat race day, semuanya lancar.
                    </p>

                    <strong>— Andi</strong>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card h-100 p-4">
                    <h5 class="fw-bold">⭐⭐⭐⭐⭐</h5>

                    <p class="text-muted mt-3">
                        Eventnya seru dan race pack lengkap. Pasti ikut lagi tahun depan.
                    </p>

                    <strong>— Sinta</strong>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card h-100 p-4">
                    <h5 class="fw-bold">⭐⭐⭐⭐⭐</h5>

                    <p class="text-muted mt-3">
                        Detail event lengkap dan proses pendaftarannya sangat mudah dipahami.
                    </p>

                    <strong>— Rizky</strong>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- ================= CTA ================= --}}

<section class="py-5 mb-5">
    <div class="container">

        <div class="hero-dashboard">

            <div>
                <h2 class="fw-bold mb-3">
                    Ready For Your Next Run?
                </h2>

                <p class="mb-0">
                    Bergabunglah bersama ribuan runner dari seluruh Indonesia.
                </p>
            </div>

            <div class="mt-4 mt-lg-0">

                @guest
                    <a href="{{ route('register') }}" class="btn btn-dark btn-lg">
                        Join Now
                    </a>
                @else
                    <a href="{{ route('peserta.dashboard') }}" class="btn btn-dark btn-lg">
                        My Dashboard
                    </a>
                @endguest

            </div>

        </div>

    </div>
</section>

@endsection