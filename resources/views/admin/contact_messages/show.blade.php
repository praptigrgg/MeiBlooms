@extends('adminlte::page')

@section('title', 'View Message')

@section('content')
<div class="container mt-4">
    <h3>Message from {{ $message->name }}</h3>

    <div class="card mt-3">
        <div class="card-header">
            <strong>Email:</strong> {{ $message->email }}<br>
            <strong>Received:</strong> {{ $message->created_at->toDayDateTimeString() }}
        </div>
        <div class="card-body">
            <p>{{ $message->message }}</p>
        </div>
    </div>

    <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary mt-3">Back to Messages</a>
</div>
@endsection
