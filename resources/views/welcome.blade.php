@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="position-relative justify-content-center py-4">
                <header class="text-center text-white">
                    <h1 class="fw-bold my-3">
                        {{ config('devstarit.app_desc') }}
                    </h1>
                    <h2 class="">Latest Blog Posts</h2>
                </header>
            </div>
            @include('blog.posts')
        </div>
    </div>

@endsection
