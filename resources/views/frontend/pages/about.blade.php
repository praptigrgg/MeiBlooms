@extends('frontend.main')

@section('title', 'About Us')

@section('content')
    <style>
        .about-hero {
            background: linear-gradient(135deg, #fbeffb, #e0f7fa);
            padding: 60px 20px;
            border-radius: 1rem;
            position: relative;
            overflow: hidden;
        }

        .about-hero::after {
            content: '';
            background: url('{{ asset('images/flower-bg.png') }}') no-repeat center center;
            background-size: contain;
            opacity: 0.1;
            position: absolute;
            bottom: 0;
            right: 0;
            width: 300px;
            height: 300px;
        }

        .icon-badge {
            width: 50px;
            height: 50px;
            background: #fff;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }
    </style>

    <div class="container my-5">

        {{-- Hero Section --}}
        <div class="about-hero text-center mb-5">
            <h1 class="display-4 fw-bold text-primary">Welcome to Mei Blooms 🌸</h1>
            <p class="lead text-dark">Pokhara’s prettiest blooms, handcrafted with love</p>
        </div>

        {{-- About Section --}}
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <img src="{{ asset('assets/images/about.jpg') }}" class="img-fluid rounded-4 shadow" alt="About Mei Blooms">
            </div>
            <div class="col-md-6">
                <div class="p-4">
                    <h3 class="mb-3 text-secondary">Our Story 🌷</h3>
                    <p class="fs-5">
                        At <strong>Mei Blooms</strong>, we believe every flower tells a story — from joyful birthdays to
                        heartfelt apologies, our bouquets are crafted to express what words sometimes cannot.
                    </p>
                    <p class="fs-5">
                        Rooted in the heart of Pokhara, Mei Blooms is proudly run by Bakery The GRG, a renowned bakery
                        beloved for its rich flavors and warm service. Expanding their passion for bringing people joy, the
                        team also runs Café Hyale, a cozy lakeside café at Damside known for its ambiance and heartfelt
                        connections. </p>
                    <p class="fs-5">
                        With the same care and creativity poured into their food and café, Mei Blooms blends nature’s
                        elegance with Nepalese warmth — bringing vibrant moments to life, one petal at a time.
                    </p>
                </div>
            </div>
        </div>

        {{-- Testimonials --}}
        <div class="text-center mb-5">
            <h4 class="fw-semibold text-primary">🌟 Customer Love</h4>
        </div>
        <div class="row g-4 mb-5">
            @php
                $testimonials = [
                    [
                        'text' => 'Best flowers in Pokhara! Delivered on time and beautifully arranged.',
                        'name' => 'Aayusha',
                    ],
                    ['text' => 'I ordered for my sister’s birthday — she loved them so much!', 'name' => 'Ramesh'],
                    ['text' => 'Affordable and fresh — what more could I ask?', 'name' => 'Kritika'],
                ];
            @endphp
            @foreach ($testimonials as $t)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 bg-light">
                        <div class="card-body">
                            <div class="icon-badge bg-pink-100 text-danger mb-3">
                                🌼
                            </div>
                            <p class="fst-italic">“{{ $t['text'] }}”</p>
                            <hr>
                            <p class="text-end fw-medium text-muted mb-0">— {{ $t['name'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Why Choose Us --}}
        <div class="text-center mb-4">
            <h4 class="fw-semibold text-success">🌼 Why Choose Us?</h4>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="row g-3">
                    @php
                        $features = [
                            ['icon' => '🚚', 'text' => 'Same-day delivery in Pokhara'],
                            ['icon' => '🌸', 'text' => 'Custom, handcrafted bouquets'],
                            ['icon' => '🧼', 'text' => 'Freshness guaranteed'],
                            ['icon' => '📞', 'text' => 'Friendly customer support'],
                        ];
                    @endphp
                    @foreach ($features as $f)
                        <div class="col-sm-6">
                            <div class="d-flex align-items-start bg-white shadow-sm rounded-4 p-3 h-100">
                                <div class="fs-2 me-3">{{ $f['icon'] }}</div>
                                <div class="fs-5">{{ $f['text'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
