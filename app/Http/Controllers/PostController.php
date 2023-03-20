<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['posts'] = Post::all();
        return view('admin.post.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::orderBy('id', 'DESC')->get();
        $data['tags']       = Tag::orderBy('id', 'DESC')->get();
        return view('admin.post.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     =>  'required|max:100',
            'content'   =>  'required',
            'thumbnail' =>  'mimes:png,jpg',
            'category'  =>  'required',
            'tags'      =>  'required|array'
        ]);

        if($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnail_name = time() . '.' . $thumbnail->extension();
            $thumbnail->move(public_path('post_thumbnails'), $thumbnail_name);
        }

        $post = Post::create([
            'title'         =>  $request->title,
            'slug'          =>  $request->title,
            'thumbnail'     =>  $thumbnail_name,
            'content'       =>  $request->content,
            'user_id'       =>  auth()->id(),
            'category_id'   =>  $request->category,
        ]);

        $post->tags()->sync($request->tags);
        return redirect()->route('posts.index')->withSuccess('Post successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
