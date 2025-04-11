@extends('adminlte::page')

@section('title', 'Contact Messages')

@section('content')
<div class="container mt-4">
    <h2>Contact Messages</h2>

    <table class="table table-bordered table-hover mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Submitted</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $msg)
                <tr>
                    <td>{{ $msg->id }}</td>
                    <td>{{ $msg->name }}</td>
                    <td>{{ $msg->email }}</td>
                    <td>{{ $msg->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn-sm btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $messages->links() }}
</div>
@endsection
