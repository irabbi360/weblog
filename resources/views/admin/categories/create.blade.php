@extends('layouts.master')

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Categories</h3>
                </div>
                @if(session('message'))
                    <div class="bg-success">{{ session('message') }}</div>
            @endif
            <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ url('categories-store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Category Name</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   name="title" id="title" placeholder="Enter Name">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
