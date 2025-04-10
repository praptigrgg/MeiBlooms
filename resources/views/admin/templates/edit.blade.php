@extends('adminlte::page')

@section('title', 'Edit ' . $title)

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    @stack('styles')

@endsection

@section('content')
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card border-0 ">
                        <div class="card-header bg-transparent">
                            <h3 class="card-title">Edit {{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form repeater" id="form" action="{{ route($route . 'update', $item->id) }}"
                            method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                                @if ($errors->any())
                                    <ul class="alert alert-danger px-5" role="alert">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                @yield('form_content')

                            </div>

                            <div class="card-footer bg-transparent">
                                <button type="submit" id="button_submit"
                                    class="btn btn-success float-right btn-sm">Update</button>
                                <a href="{{ route($route . 'index') }}"
                                    class="btn btn-outline-secondary float-right mr-2 btn-sm"><i
                                        class="fas fa-arrow-left fa-sm"></i> Go Back</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@stop

@section('js')
@stop
