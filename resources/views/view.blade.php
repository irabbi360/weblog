@extends('layouts.app')

@section('content')
    <div class="row mt-4">
        <div class="col-md-8 mb-3">
            <div class="card mb-4 bg-dark shadow-sm">
                <div class="card-body">
                    <div class="author text-white">
                        <strong>Created By: {{ $post->user->name }}</strong>
                        <strong class="float-right">Category: {{ $post->category->title }}</strong>
                        <p>Created At: {{ $post->created_at }}</p>
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
                        <li id="comment-1" class="rounded-lg bg-gray-200 bg-gray-700 p-4 my-4 relative group">
                            <div>
                                <a href="#/posts?author=1">
                                    <small class="opacity-75">@</small>Admin:
                                </a>
                            </div>
                            <p class="ms-2 mt-2 ps-2 border-l-2 border-gray-300 border-gray-600">
                                Velit quia repellat fugit tempora voluptatibus labore quos.
                            </p>

                        </li>
                        <li id="comment-2" class="rounded-lg bg-gray-200 bg-gray-700 p-4 my-4 relative group">
                            <div>
                                <a href="#/posts?author=3">
                                    <small class="opacity-75">@</small>Guest:
                                </a>
                            </div>
                            <p class="ms-2 mt-2 ps-2 border-l-2 border-gray-600">

                                Eaque distinctio aliquid atque autem.
                            </p>

                        </li>
                        <li id="comment-3" class="rounded-lg bg-gray-200 bg-gray-700 p-4 my-4 relative group">
                            <div>
                                <a href="#/posts?author=12">
                                    <small class="opacity-75">@</small>Dan:
                                </a>
                            </div>
                            <p class="ml-2 mt-2 pl-2 border-l-2 border-gray-300 border-gray-600">
                                Enim ipsa eum eos voluptate.
                            </p>

                            <form action="#/comments/3" method="POST" class="absolute top-3 right-4" onsubmit="return confirm('Are you sure you want to delete this comment?')">
                                <input type="hidden" name="_method" value="DELETE">									<input type="hidden" name="_token" value="6CL2RyzTix5MH4gNXVeaKk6pcv0rOiTgaxXwcMiy">																		<a class="font-semibold dark:font-medium mr-2 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-opacity" href="#/comments/3/edit">
                                    Edit
                                </a>
                                <button type="submit" class="font-semibold text-red-600 text-red-500 invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-opacity">Delete</button>
                            </form>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="col-md-4">
            <ul class="list-group mb-3">
                <li class="list-group-item active">Categories</li>
                @foreach($categories as $category)
                    <li class="list-group-item">
                        <a href="{{ route('categoryPost', $category->id) }}">{{ $category->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
