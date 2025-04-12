@extends('adminlte::page')
@section('title', 'Order Details')

@section('content')
<div class="container-fluid">
    <h1>Order #{{ $order->id }} Details</h1>

    <div class="mb-4">
        <h5>Customer Info</h5>
        <p><strong>Name:</strong> {{ $order->name }}</p>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Phone:</strong> {{ $order->phone }}</p>
        <p><strong>Address:</strong> {{ $order->address }}</p>
        <p><strong>Ordered At:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
    </div>

    <div class="card">
        <div class="card-header">
            <strong>Order Items</strong>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Bouquet</th>
                        <th>Quantity</th>
                        <th>Price (Rs)</th>
                        <th>Subtotal (Rs)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $item->bouquet->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price, 2) }}</td>
                            <td>{{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                    <tr class="table-active">
                        <td colspan="3" class="text-right"><strong>Total:</strong></td>
                        <td><strong>Rs. {{ number_format($order->total_price, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
