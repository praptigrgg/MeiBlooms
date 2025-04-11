@extends('adminlte::page')


@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Bouquet</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.bouquets.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <!-- Type -->
                <div class="form-group">
                    <label>Type</label>
                    <input type="text" name="type" class="form-control" value="{{ old('type') }}">
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label>Price (Rs.)</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                </div>

                <!-- Discount Price -->
                <div class="form-group">
                    <label>Discount Price (Optional)</label>
                    <input type="number" name="discount_price" class="form-control" value="{{ old('discount_price') }}">
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>


                <!-- Image -->
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Save Bouquet</button>
            </form>

        </div>
    </div>
@endsection
