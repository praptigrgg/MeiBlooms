{{-- resources/views/frontend/pages/shop.blade.php --}}
@extends('frontend.main')


@section('content')
    <div class="container mx-auto py-8 flex flex-col md:flex-row gap-6">
        <!-- Filters Sidebar -->
        <aside class="md:w-1/4 w-full">
            <form method="GET" action="{{ route('frontend.pages.shop') }}" class="space-y-4 bg-white p-4 rounded shadow">
                <div>
                    <label class="block mb-1">Type</label>
                    <select name="type" class="w-full border rounded p-2">
                        <option value="">All</option>
                        <option value="roses" {{ request('type') == 'roses' ? 'selected' : '' }}>Roses</option>
                        <option value="tulips" {{ request('type') == 'tulips' ? 'selected' : '' }}>Tulips</option>
                        <!-- Add more types here -->
                    </select>
                </div>

                <div>
                    <label class="block mb-1">Price Range</label>
                    <input type="number" name="min_price" class="w-full border rounded p-2 mb-2" placeholder="Min"
                        value="{{ request('min_price') }}">
                    <input type="number" name="max_price" class="w-full border rounded p-2" placeholder="Max"
                        value="{{ request('max_price') }}">
                </div>

                <button type="submit" class="btn btn-success w-20">Apply Filters</button>






            </form>
        </aside>

        <!-- Products Grid -->
        <section class="md:w-3/4 w-full">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                @forelse($bouquets as $bouquet)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            @if ($bouquet->discount_price)
                                <div class="position-absolute top-0 end-0 bg-danger text-white px-2 py-1 rounded-start">
                                    -{{ 100 - round(($bouquet->discount_price / $bouquet->price) * 100) }}%
                                </div>
                            @endif

                            <a href="{{ route('bouquet.details', $bouquet->id) }}">
                                <img src="{{ asset('storage/' . $bouquet->image) }}" class="card-img-top"
                                    alt="{{ $bouquet->name }}" style="height: 450px; object-fit: cover;">
                            </a>

                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title">{{ $bouquet->name }}</h5>
                                    <p class="card-text">
                                        @if ($bouquet->discount_price)
                                            <span class="text-danger fw-bold">Rs.{{ $bouquet->discount_price }}</span>
                                            <span
                                                class="text-muted text-decoration-line-through ms-2">Rs.{{ $bouquet->price }}</span>
                                        @else
                                            <span class="fw-bold">Rs.{{ $bouquet->price }}</span>
                                        @endif
                                    </p>
                                </div>

                                <form action="{{ route('cart.add', $bouquet->id) }}" method="POST" class="mt-auto">
                                    @csrf
                                    <button class="btn btn-success w-100">Add to Cart</button>
                                </form>
                            </div>
                        </div>

                    </div>
                @empty
                    <p>No bouquets found for your filter.</p>
                @endforelse
            </div>
        </section>

    </div>

    <!-- Pagination -->
    <div class="mt-8 text-center">
        {{ $bouquets->withQueryString()->links() }}
    </div>
@endsection
