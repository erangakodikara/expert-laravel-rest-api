<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy("created_at", "desc")->paginate(10);
        return view("post")->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post = new Post();

        $validated = $request->validate([
            'title' => 'required|max:255|min:3',
            'description' => 'required',
        ]);

        $post->title = $validated['title'];
        $post->description = $validated['description'];
        $post->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $post=Post::find($request->id);

        $validated = $request->validate([
            'title' => 'required|max:255|min:3',
            'description' => 'required',
        ]);
        
        $post->title = $validated['title'];
        $post->description = $validated['description'];

        $post->save();
        $posts = Post::orderBy("created_at", "desc")->paginate(10);
        return redirect("post")->with('posts', $posts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    function updatPostStatus($id)
    {
        $post = Post::find($id);
        if ($post->active) {
            $post->active = 0;
        } else {
            $post->active = 1;
        }
        $post->save();
        return redirect()->back();
    }
    function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }

    function updatePostView($id) {
        $post = Post::find($id);

        return view("updatepost")->with('post', $post);
    }
}
