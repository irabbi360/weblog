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
        $posts = Post::when($request->search, function ($query) use ($request) {
            $search = $request->search;

            return $query->where('title', 'like', "%$search%")
                ->orWhere('body', 'like', "%$search%");
        })->with('tags', 'category', 'user')
            ->withCount('comments')
            ->published()
            ->paginate(10);

        return view('welcome', compact('posts'));
    }

    public function singlePost($id)
    {
        $post = Post::with('comments.user', 'tags', 'user', 'category')->findOrFail($id);

        return view('view', compact('post'));
    }

    public function categoryPost($id)
    {
        $category = Category::with('posts')->findOrFail($id);

        return view('category-post', compact('category'));
    }

    public function comment(StoreCommentRequest $request, Post $post)
    {
        $post->comments()->create([
            'body' => $request->comment,
        ]);

        return redirect()->back();
    }
}
