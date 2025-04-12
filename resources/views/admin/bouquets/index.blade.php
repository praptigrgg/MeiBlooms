@extends('adminlte::page')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">All Bouquets</h3>
        <a href="{{ route('admin.bouquets.create') }}" class="btn btn-sm btn-success">Add New</a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bouquets as $bouquet)
                <tr>
                    <td>{{ $bouquet->name }}</td>
                    <td>{{ $bouquet->type }}</td>
                    <td>Rs. {{ $bouquet->price }}</td>
                    <td>
                        @if($bouquet->discount_price)
                            Rs. {{ $bouquet->discount_price }}
                        @else
                            -
                        @endif
                    </td>
                    <td><img src="{{ asset('storage/' . $bouquet->image) }}" height="50"></td>
                    <td>
                        <a href="{{ route('admin.bouquets.edit', $bouquet->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form method="POST" action="{{ route('admin.bouquets.destroy', $bouquet->id) }}" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this bouquet?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No bouquets found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $bouquets->onEachSide(1)->links('pagination::bootstrap-5') }}
    </div>


</div>
@endsection
