@extends('frontend.main')

@section('title', 'Search Results')

@section('content')
<div class="container py-5">
    <h2>Search Results for: "{{ $query }}"</h2>
    <div class="row mt-4">
        @forelse($bouquets as $bouquet)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $bouquet->image) }}" class="card-img-top" alt="{{ $bouquet->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $bouquet->name }}</h5>
                        <p class="card-text">${{ $bouquet->price }}</p>
                        <a href="{{ route('bouquet.details', $bouquet->id) }}" class="btn btn-success">View</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No bouquets found matching your search.</p>
        @endforelse
    </div>
</div>
@endsection
