@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="my-2">
            <h3>Category: {{ $category->title }}</h3>
        </div>
        <div class="mt-4">
            <form method="get" action="{{ route('search') }}">
                @csrf
                <div class="input-group input-group-lg mb-3">
                    <input type="text" name="search" placeholder="Enter keyword to search" value="" class="form-control">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            @foreach($category->posts as $post)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" data-src="{{ 'uploads/posts/'.$post->thumbnail }}" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{ 'uploads/posts/'.$post->thumbnail }}" data-holder-rendered="true">
                        <div class="card-body">
                            <p class="card-text">{{ $post->title }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('singlePost', $post->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    {{--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
                                </div>
                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
