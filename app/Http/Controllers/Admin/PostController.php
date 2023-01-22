<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category','user')->orderBy('id','desc')->paginate();

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = time().'.'. $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('uploads/posts/'. $fileName));
        }

        $post = Post::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'description' => $request->description,
            'created_by' => Auth::id(),
            'thumbnail' => $fileName,
        ]);

       if ($post){
           $tagsId = collect($request->tags)->map(function ($tag) {
               return Tag::firstOrCreate(['name' => $tag])->id;
           });

           $post->tags()->attach($tagsId);

           return redirect()->back()->with('message','Post successfully saved');
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
    public function edit($id)
    {
        $post = Post::findOrfail($id);
        $categories = Category::all();

        return view('admin.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            //'image' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = time().'.'. $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('uploads/posts/'. $fileName));
        }

        $post = Post::find($id);
        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->description = $request->description;
        $post->created_by = Auth::id();
        $post->thumbnail = $fileName;

        if ($post->save()){
            return redirect()->back()->with('message','Post updated successfully');
        }
        return redirect()->back()->with('message','Whoops!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->delete()){
            return redirect()->back()->with('message','Post deleted successfully');
        }
        return redirect()->back()->with('message','Whoops!!');
    }
}
