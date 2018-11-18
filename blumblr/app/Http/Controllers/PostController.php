<?php

namespace App\Http\Controllers;

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
        $posts = \App\Post::where('user_id', \Auth::id())->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $post = new \App\Post;
        // $post->name = 'Derrick';
        $post->title = $request->input('postname');
        $post->user_id = $request->input('postid');
        $post->post = $request->input('postpost');
        $post->save();

        $request->session()->flash('status', "A new post called {$post->title} was added.");
        return redirect('/posts');
        // dd($request);
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
        //
        $post = \App\Post::find($id);
        return view('posts.edit', compact('post'));
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
        //
        $post = \App\Post::find($id);
        $post->title = $request->input('postname');
        $post->user_id = $request->input('postid');
        $post->post = $request->input('postpost');
        $post->save();

        $request->session()->flash('status', "This post is now called <strong>{$post->title}</strong> .");
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $post = \App\Post::find($id);
        $post->delete();

        $request->session()->flash('status', "This post called <strong>{$post->title}</strong> was deleted .");
        return redirect('/posts');
    }

    public function confirmDelete($id){
      $post = \App\Post::find($id);
      return view('posts.confirmDelete', compact('post'));
    }

}
