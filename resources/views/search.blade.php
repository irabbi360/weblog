@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="my-2">
            <h3>Search Keyword: {{ $search }}</h3>
        </div>

        <div class="row">
            @if($posts->count() > 0)
            @foreach($posts as $post)
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
                {{ $posts->links() }}
            @else
                <h3 class="mt-3">Post not found!</h3>
            @endif
        </div>
    </div>


@endsection
