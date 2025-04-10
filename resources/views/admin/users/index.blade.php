@extends('admin.templates.index')

@push('styles')
@endpush

@section('index_content')
    <div class="table-responsive">
        <table class="table w-100 table-hover data-table" id="data-table">
            <thead>
                <tr class="text-left text-capitalize">
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th width="20%">action</th>
                </tr>
            </thead>
            <tbody class="tbody-sortable">
                @forelse ($users as $key => $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->status == 'active' ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.users.edit', $item->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.users.destroy', $item->id) }}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="6">No Record Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
@endpush
