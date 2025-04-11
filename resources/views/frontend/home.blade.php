@extends('frontend.main')

@section('title', 'Welcome to MeiBlooms')

@section('content')

{{-- 🌺 Hero Banner --}}
<section class="bg-light py-5 text-center">
    <div class="container">
        <h1 class="display-4">Beautiful Bouquets for Every Occasion 🌸</h1>
        <p class="lead">Send love, celebrate joy – one bloom at a time.</p>
        <a href="{{ route('frontend.pages.shop') }}" class="btn btn-success btn-lg mt-3">Shop Now</a>
    </div>
</section>

{{-- 🌟 Featured Bouquets --}}
<section class="container py-5">
    <h2 class="text-center mb-4">Featured Bouquets</h2>
    <div class="row">
        <div class="col-md-4 d-flex align-items-stretch mb-4">
            <div class="card shadow-sm w-100 d-flex flex-column">
                <img src="{{ asset('assets/images/7.jpg') }}" class="card-img-top" alt="Rose Delight" style="height: 450px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">35K Money Bouquet</h5>
                    <p class="text-muted">Rs.40,000</p>
                    <div class="mt-auto">
                        <a href="#" class="btn btn-outline-success w-100">Order Now</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 d-flex align-items-stretch mb-4">
            <div class="card shadow-sm w-100 d-flex flex-column">
                <img src="{{ asset('assets/images/8.jpg') }}" class="card-img-top" alt="Sunflower Splash" style="height: 450px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Purple Ferrylight Bouquet</h5>
                    <p class="text-muted">Rs.1,500</p>
                    <div class="mt-auto">
                        <a href="#" class="btn btn-outline-success w-100">Order Now</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 d-flex align-items-stretch mb-4">
            <div class="card shadow-sm w-100 d-flex flex-column">
                <img src="{{ asset('assets/images/14.jpg') }}" class="card-img-top" alt="Mixed Blossom" style="height: 450px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">White Rose Bouquet</h5>
                    <p class="text-muted">Rs.2,100</p>
                    <div class="mt-auto">
                        <a href="#" class="btn btn-outline-success w-100">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- 🧺 Categories --}}
<section class="bg-success text-white py-5">
    <div class="container text-center">
        <h2 class="mb-4">Shop by Category</h2>
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-3 mb-3">
                    <a href="{{ route('category.bouquets', $category->id) }}" class="text-decoration-none">
                        <div class="p-4 bg-white text-success rounded shadow-sm">
                            {{ $category->name }}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>


{{-- 🤑 Offers & Discounts --}}
<section class="bg-warning py-5 text-center">
    <div class="container">
        <h2 class="mb-3">Special Offer 🎁</h2>
        <p class="lead">Get 10% off your first order! Use code: <strong>WELCOME10</strong></p>
    </div>
</section>

{{-- 💬 Testimonials --}}
<section class="py-12 bg-white">
    <h2 class="text-3xl font-semibold text-center mb-8">What Our Customers Say</h2>

    <div class="max-w-4xl mx-auto space-y-8">
        @forelse($testimonials as $testimonial)
            <div class="bg-gray-100 p-6 rounded-lg shadow text-center">
                <p class="text-lg italic text-gray-700">“{{ $testimonial->message }}”</p>
                <p class="mt-4 font-semibold text-green-700">- {{ $testimonial->name }}</p>
            </div>
        @empty
            <p class="text-center text-gray-500">No testimonials available yet.</p>
        @endforelse
    </div>
</section>
