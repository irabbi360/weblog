@extends('layouts.master')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header">
            <h5 class="card-title">Edit Category #{{ $category->id }}</h5>
        </div>
        <form role="form" method="post" action="{{ route('admin.categories.update', $category->id) }}">
            @csrf
            {{ method_field('PUT') }}
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           name="title" value="{{ $category->title }}" id="title"
                           placeholder="Enter title">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
