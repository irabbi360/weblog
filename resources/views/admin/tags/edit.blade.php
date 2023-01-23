@extends('layouts.master')

@section('content')
        <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Tag #{{ $tag->id }}</h3>
                        </div>
                        @if(session('message'))
                            <div class="bg-success">{{ session('message') }}</div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{ url('tags/update', $tag->id) }}">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Tag Name</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $category->title }}" id="title" placeholder="Enter Name">
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
        </div>
    </section>

@endsection
