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

        $postQuery = (new \App\Models\Post)->getDashboardPosts();
        $count['posts'] = $postQuery->count();
        $count['posts_read'] = $postQuery->sum('read_count');
        $newPosts = $postQuery->limit(5)->get();
        $topPosts = $postQuery->orderBy('read_count', 'desc')->limit(5)->get();

        $count['tags'] = Tag::count();
        $count['comments'] = Comment::where('user_id', auth()->id())->count();

        return view('admin.index', compact('count', 'newPosts', 'topPosts'));
    }
}
