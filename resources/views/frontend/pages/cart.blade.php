@extends('frontend.main')

@section('title', 'Your Cart')

@section('content')
<div class="container my-5">
    <h2>Your Cart 🛒</h2>

    @if(session('cart') && count(session('cart')) > 0)
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Bouquet</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($cart as $id => $item)
                    @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                    <tr>
                        <td><img src="{{ asset('storage/' . $item['image']) }}" width="70"></td>
                        <td>{{ $item['name'] }}</td>
                        <td>Rs.{{ $item['price'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>Rs.{{ $subtotal }}</td>
                        <td><a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Remove</a></td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-end"><strong>Total:</strong></td>
                    <td colspan="2"><strong>Rs.{{ $total }}</strong></td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('cart.clear') }}" class="btn btn-outline-danger">Clear Cart</a>
        <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>

    @else
        <p>Your cart is empty 😕</p>
    @endif
</div>
@endsection
