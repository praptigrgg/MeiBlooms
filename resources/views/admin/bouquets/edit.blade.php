@extends('adminlte::page')

@section('content')
<div class="card">
    <div class="card-header"><h3 class="card-title">Edit Bouquet</h3></div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.bouquets.update', $bouquet->id) }}" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name', $bouquet->name) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Type</label>
                <input type="text" name="type" value="{{ old('type', $bouquet->type) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Price (Rs.)</label>
                <input type="number" name="price" value="{{ old('price', $bouquet->price) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Discount Price (Optional)</label>
                <input type="number" name="discount_price" value="{{ old('discount_price', $bouquet->discount_price) }}" class="form-control">
            </div>

            <div class="form-group">
                <label>Current Image</label><br>
                <img src="{{ asset('storage/' . $bouquet->image) }}" height="80"><br><br>
                <label>Change Image</label>
                <input type="file" name="image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Update Bouquet</button>
        </form>
    </div>
</div>
@endsection
