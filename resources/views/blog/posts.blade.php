<div class="row">
    @foreach($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm bg-dark rounded-3 h-100">
                {{--<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22288%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20288%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16ac078098d%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16ac078098d%22%3E%3Crect%20width%3D%22288%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.8359375%22%20y%3D%22118.8%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">--}}
                <a href="{{ route('singlePost', $post->id) }}">
                    <img class="card-img-top" data-src="{{ $post->thumbnail ? 'uploads/posts/'.$post->thumbnail : asset('images/placeholder-post.png') }}"
                         alt="Thumbnail" style="height: 225px; width: 100%; display: block;"
                         src="{{ $post->thumbnail ? 'uploads/posts/'.$post->thumbnail : asset('images/placeholder-post.png') }}" data-holder-rendered="true">
                </a>
                <div class="card-body">
                    <a href="{{ route('singlePost', $post->id) }}">
                        <h3 class="card-text">{{ $post->title }}</h3>
                    </a>
                    <p class="text-gray-400">By <a href="#">{{ optional($post->user)->name }}</a> <span>{{ $post->created_at->format('m/d/Y') }}</span>
                        <span class="d-inline float-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                            {{ $post->comments_count }}
                        </span>
                    </p>
                    <p class="text-gray-400">{{ Str::limit(strip_tags($post->body), 50) }}</p>
                </div>
                <div class="card-footer bg-transparent border-0 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('singlePost', $post->id) }}"
                               class="btn btn-sm btn-primary text-white">Read more
                                <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                        <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="justify-content-center text-center">
    {{ $posts->links() }}
</div>
