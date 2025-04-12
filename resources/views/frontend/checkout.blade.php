@extends('frontend.main')

@section('title', 'Checkout')

@section('content')
<div class="container my-5">
    <h2>Checkout 💐</h2>

    @if(session('cart') && count(session('cart')) > 0)
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Name *</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email *</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Phone *</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Address *</label>
                <textarea name="address" class="form-control" required></textarea>
            </div>

            <h5>Order Summary 🧾</h5>
            <ul class="list-group mb-3">
                @php $total = 0; @endphp
                @foreach (session('cart') as $item)
                    @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                    <li class="list-group-item d-flex justify-content-between">
                        {{ $item['name'] }} (x{{ $item['quantity'] }})
                        <span>Rs.{{ $subtotal }}</span>
                    </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <strong>Total</strong>
                    <strong>Rs.{{ $total }}</strong>
                </li>
            </ul>

            <button type="submit" class="btn btn-success">Place Order</button>
        </form>
    @else
        <p>Your cart is empty 😕</p>
    @endif
</div>
@endsection
