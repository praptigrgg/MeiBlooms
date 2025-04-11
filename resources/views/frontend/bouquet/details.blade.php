@extends('frontend.main')

@section('title', $bouquet->name)

@section('content')
<div class="container py-5">
    <div class="row">
        {{-- Bouquet Image --}}
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $bouquet->image) }}" alt="{{ $bouquet->name }}" class="img-fluid rounded shadow-sm">
        </div>

        {{-- Bouquet Info --}}
        <div class="col-md-6">
            <h1>{{ $bouquet->name }}</h1>
            <p class="text-muted">${{ number_format($bouquet->price, 2) }}</p>
            <p>{{ $bouquet->description ?? 'This bouquet is perfect for your special occasion.' }}</p>

            <a href="#" class="btn btn-success">Add to Cart</a>
        </div>
    </div>
</div>

{{-- 🌼 Related Bouquets --}}
<section class="bg-light py-5">
    <div class="container">
        <h3 class="text-center mb-4">You may also like</h3>
        <div class="row">
            @forelse($relatedBouquets as $related)
                <div class="col-md-3 d-flex align-items-stretch mb-4">
                    <div class="card shadow-sm w-100">
                        <img src="{{ asset('storage/' . $related->image) }}" class="card-img-top" alt="{{ $related->name }}" style="height: 250px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $related->name }}</h5>
                            <p class="text-muted">${{ number_format($related->price, 2) }}</p>
                            <a href="{{ route('bouquet.details', $related->id) }}" class="btn btn-outline-success mt-auto w-100">View</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No related bouquets found.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
