@extends('adminlte::page')

@section('title', 'Add ' . $title)

@section('css')
@endsection

@section('content')
    <section class="content pt-3">
        <div class="container-fluid">
            @if ($errors->any())
                <div class="alert alert-danger px-5" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card rounded-lg border-0 ">
                        <div class="card-header bg-transparent">
                            <h3 class="card-title">Add {{ $title }}</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form repeater" id="form" name="myForm" action="{{ route($route . 'store') }}"
                            method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @yield('form_content')

                            </div>
                            <div class="card-footer bg-transparent">
                                <button type="submit" id="button_submit"
                                    class="button_submit btn btn-success float-right btn-sm">Submit
                                </button>
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
