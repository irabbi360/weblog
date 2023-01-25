<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::getAllPosts($request)->paginate(15);

        return view('welcome', compact('posts'));
    }

    public function singlePost($id)
    {
        $post = Post::with('comments.user', 'tags', 'user', 'category')->findOrFail($id);

        return view('blog.post', compact('post'));
    }

    public function categoryPosts(Request $request, $id)
    {
        $posts = Post::getAllPosts($request)
            ->where('category_id', $id)
            ->paginate(15);

        return view('welcome', compact('posts'));
    }

    public function tagPosts(Request $request, $id)
    {
        $posts = Post::getAllPosts($request)
            ->whereHas('tags', function ($q) use ($id) {
                $q->where('tag_id', $id);
            })
            ->paginate(15);

        return view('welcome', compact('posts'));
    }

    public function comment(StoreCommentRequest $request, Post $post)
    {
        $post->comments()->create([
            'body' => $request->comment,
        ]);

        return redirect()->back();
    }
}
