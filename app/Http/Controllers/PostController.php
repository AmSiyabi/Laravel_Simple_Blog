<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts  = Post::paginate(5);

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate input
        $this->validate($request, array(
            'title' => 'required|max:256',
            'body' => 'required',
            
        ));

        // put to database
        $post = new Post;
        $post->title = $request -> title;
        $post->body = $request -> body;
        $post->image = $request -> image;
        $post->save();

        Session::flash('success', 'Blog post uplaoded!');

        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, array(
            'title' => 'required|max:256',
            'body' => 'required',
            
        ));

        $post= Post::find($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();

        // success message
        Session::flash('success', 'Your Post Was Saved!');

        return redirect()->route('posts.show', $post->id);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'The Post Was Deleted!');
        return redirect()->route('posts.index');
    }
}
