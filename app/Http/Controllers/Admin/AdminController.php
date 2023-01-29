<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $count['users'] = User::count();
        $count['posts'] = Post::getDashboardPosts()->count();
        $count['posts_read'] = Post::getDashboardPosts()->sum('read_count');
        $count['tags'] = Tag::count();
        $count['comments'] = Comment::where('user_id', auth()->id())->count();

        $newPosts = Post::getDashboardPosts()->limit(5)->get();
        $topPosts = Post::getDashboardPosts()->orderBy('read_count', 'desc')->limit(5)->get();

        return view('admin.index', compact('count', 'newPosts', 'topPosts'));
    }
}
