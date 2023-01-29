@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-8 mb-3">
            <div class="card mb-4 bg-dark shadow-sm">
                <div class="card-body">
                    <div class="author text-white">
                        <h2>{{ $post->title }}</h2>
                        <div class="text-white-50">
                            Posted By: <a href="#">{{ optional($post->user)->name }}</a>
                            {{ $post->created_at->format('m/d/Y h:m a') }}. category:
                            <a href="{{ route('category.posts', $post->category_id) }}">
                                {{ optional($post->category)->title }}
                            </a>
                            @if($post->tags->count() > 0)
                                tags: @foreach($post->tags as $tag)
                                    <a href="{{ route('tag.posts', $tag->id) }}" class="me-1">
                                        {{ $tag->title }}
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <hr class="text-gray-400">
                    @if($post->thumbnail)
                    <img class="card-img-top" src="{{ '/uploads/posts/'.$post->thumbnail }}" alt="">
                    @endif
                    <div class="post-body text-white">
                        {!! $post->body !!}
                    </div>
                </div>
                <div class="card-footer bg-transparent border-t-2 border-gray-600">
                    <h4 class="text-white">Comments</h4>
                    <div class="">
                        @auth
                            <form action="{{ route('comment.save', $post->id) }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="comment">Comment</label>
                                    <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror" cols="30" rows="3">{{ old('comment') }}</textarea>
                                    @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        @else
                            <p class="text-white-50">Need to <a href="{{ route('login') }}">login</a> for comment!</p>
                        @endauth
                    </div>
                    <ul>
                        @forelse ($post->comments as $comment)
                            <li id="comment-1" class="rounded-lg bg-gray-200 bg-gray-700 p-4 my-4 relative group">
                                <div>
                                    <a href="#/posts?author={{ $comment->user_id }}">
                                        <small class="opacity-75">@</small>{{ optional($comment->user)->name }}: <span class="float-end">{{ $comment->created_at->diffForHumans() }}</span>
                                    </a>
                                </div>
                                <p class="ms-2 mt-2 ps-2 border-l-2 border-gray-300 border-gray-600">
                                    {{ $comment->body }}
                                </p>
                            </li>
                        @empty
                            <li id="comment-1" class="rounded-lg bg-gray-200 bg-gray-700 p-4 my-4 relative group">
                                <div>
                                    Not Found!!
                                </div>
                                <p class="ms-2 mt-2 ps-2 border-l-2 border-gray-300 border-gray-600">
                                    Sorry! No comment found for this post.
                                </p>
                            </li>
                        @endforelse
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection
