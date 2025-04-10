@extends('admin.templates.edit')

@push('styles')
@endpush

@section('form_content')
    @include('admin.users.form', ['action' => 'edit'])
@endsection

@push('scripts')
@endpush
