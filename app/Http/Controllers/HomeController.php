<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->paginate(10);
        $categories = Category::all();

        return view('welcome', compact('posts','categories'));
    }

    public function singlePost($id)
    {
        $post = Post::with('user','category')->findOrFail($id);

        $categories = Category::all();

        return view('view', compact('post','categories'));
    }

    public function categoryPost($id)
    {
        $category = Category::with('posts')->findOrFail($id);

        return view('category-post', compact('category'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $posts = Post::where('title','LIKE', "%$search%")->paginate();

        return view('search', compact('posts','search'));
    }
}
