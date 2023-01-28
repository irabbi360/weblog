<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $count['users'] = User::count();
        $count['posts'] = Post::count();
        $count['tags'] = Tag::count();

        $newPosts = Post::latest()->limit(5)->get();
        $topPosts = Post::orderBy('read_count', 'desc')->limit(5)->get();

        return view('admin.index', compact('count', 'newPosts', 'topPosts'));
    }
}
