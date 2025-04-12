@extends('adminlte::page')
@section('title', 'Orders')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Customer Orders</h1>

    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Total (Rs)</th>
                <th>Submitted</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info">View</a>


                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No orders yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
