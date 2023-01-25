@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-8 mb-3">
            <div class="card mb-4 bg-dark shadow-sm">
                <div class="card-body">
                    <div class="author text-white">
                        <strong>Created By: {{ optional($post->user)->name }}</strong>
                        <strong class="float-right">Category: {{ optional($post->category)->title }}</strong>
                        <p>Created At: {{ $post->created_at->format('m/d/Y') }}</p>
                    </div>
                    <img class="card-img-top" src="{{ '/uploads/posts/'.$post->thumbnail }}" alt="Card image cap">
                    <hr>
                    <div class="post-body text-white">
                        {!! $post->body !!}
                    </div>
                </div>
                <div class="card-footer bg-transparent border-t-2 border-gray-600">
                    <h4 class="text-white">Comments</h4>
                    <ul>
                        @foreach($post->comments as $comment)
                        <li id="comment-1" class="rounded-lg bg-gray-200 bg-gray-700 p-4 my-4 relative group">
                            <div>
                                <a href="#/posts?author={{ $comment->user_id }}">
                                    <small class="opacity-75">@</small>{{ optional($comment->user)->name }}:
                                </a>
                            </div>
                            <p class="ms-2 mt-2 ps-2 border-l-2 border-gray-300 border-gray-600">
                                {{ $comment->body }}
                            </p>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection
