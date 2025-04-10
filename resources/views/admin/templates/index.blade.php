@extends('adminlte::page')

@section('title', $title . ' | Leave MS')

@section('css')
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />

@endsection

@section('content')
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card border-0 m-0 ">
                        <div class="card-header bg-transparent">
                            <h3 class="card-title mt-4">{{ $title }}</h3>
                            @if (!isset($hideCreate))
                                @if (isset($modalCreate))
                                    <button type="button" class="btn btn-secondary float-right btn-sm" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <i class="fa fa-plus"></i>
                                        <span class="kt-hidden-mobile">Add new</span>
                                    </button>
                                @else
                                    <a href="{{ route($route . 'create') }}"
                                        class="btn btn-success float-right btn-sm me-4 my-2">
                                        <i class="fa fa-plus"></i>
                                        <span class="kt-hidden-mobile">Add new</span>
                                    </a>
                                @endif
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @yield('index_content')
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@stop

@section('js')
    @stack('scripts')
    @yield('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.deleteBtn', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parent().submit();
                }
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
        integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection
