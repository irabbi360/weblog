<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $posts = (new \App\Models\Post)->getDashboardPosts()->with('category','user')->paginate(15);

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all();
        $tags = Tag::pluck('title', 'title')->all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        abort_if(Gate::denies('post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->hasFile('thumbnail')){
            $thumbnail = $request->file('thumbnail');
            $fileName = time().'.'. $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->save(public_path('uploads/posts/'. $fileName));
        }

        $post = new Post();
        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->body = $request->body;
        $post->thumbnail = $fileName;
        $post->is_published = 1;

       if ($post->save()){
           $tagsId = collect($request->tags)->map(function ($tag) {
               return Tag::firstOrCreate(['title' => $tag])->id;
           });

           $post->tags()->attach($tagsId);

           return redirect()->route('admin.posts.index')->with('message','Post successfully saved');
       }

       return redirect()->back()->with('message','Whoops! something went wrong!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        abort_if(Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $post->load('tags');
        $categories = Category::all();
        $tags = Tag::pluck('title', 'title')->all();

        return view('admin.posts.edit', compact('post','categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        abort_if(Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->hasFile('thumbnail')){
            $thumbnail = $request->file('thumbnail');
            $fileName = time().'.'. $thumbnail->getClientOriginalExtension();
            Image::make($thumbnail)->save(public_path('uploads/posts/'. $fileName));
        }

        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->body = $request->description;
        $post->thumbnail = $fileName ?? $post->thumbnail;

        if ($post->save()){
            $tagsId = collect($request->tags)->map(function ($tag) {
                return Tag::firstOrCreate(['title' => $tag])->id;
            });

            $post->tags()->sync($tagsId);

            return redirect()->back()->with('message','Post updated successfully');
        }
        return redirect()->back()->with('error','Whoops!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $post = Post::findOrFail($id);

        if ($post->delete()){
            return redirect()->back()->with('message','Post deleted successfully');
        }
        return redirect()->back()->with('message','Whoops!!');
    }

    public function publish(Post $post)
    {
        $post->is_published = ! $post->is_published;
        $post->save();

        return redirect()->back()->with('message','Post changed successfully.');
    }
}
