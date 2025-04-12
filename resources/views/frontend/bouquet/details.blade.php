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
{{-- 🌟 Reviews Section --}}
<section class="container py-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h3 class="mb-4">Customer Reviews</h3>

            {{-- Show Existing Reviews --}}
            @if ($bouquet->reviews->count())
                @foreach ($bouquet->reviews->sortByDesc('created_at') as $review)
                    <div class="border rounded p-3 mb-3">
                        <strong>{{ $review->user->name }}</strong>
                        <span class="text-warning">
                            @for ($i = 0; $i < $review->rating; $i++) ★ @endfor
                            @for ($i = $review->rating; $i < 5; $i++) ☆ @endfor
                        </span>
                        <small class="text-muted ms-2">{{ $review->created_at->diffForHumans() }}</small>
                        <p class="mt-2">{{ $review->comment }}</p>
                    </div>
                @endforeach
            @else
                <p class="text-muted">No reviews yet. Be the first to leave one!</p>
            @endif

            {{-- Review Form --}}
            @auth
                <div class="card mt-4">
                    <div class="card-header">Leave a Review</div>
                    <div class="card-body">
                        <form action="{{ route('reviews.store', $bouquet->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <select name="rating" class="form-select" required>
                                    <option value="">Choose rating</option>
                                    @for ($i = 5; $i >= 1; $i--)
                                        <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="comment" class="form-label">Comment</label>
                                <textarea name="comment" class="form-control" rows="3" placeholder="Write something..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Submit Review</button>
                        </form>
                    </div>
                </div>
            @else
                <p class="text-muted mt-4">Please <a href="{{ route('login') }}">log in</a> to leave a review.</p>
            @endauth
        </div>
    </div>
</section>

@endsection
