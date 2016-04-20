<?php

namespace instablog\Http\Controllers;

use Illuminate\Http\Request;

use instablog\Http\Requests;
use instablog\Http\Requests\CreatePostRequest;
use instablog\Http\Requests\UpdatePostRequest;
use instablog\Http\Controllers\Controller;
use instablog\Post;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
                    'message' => 'Start Writing!',
                    'posts'   => Post::orderby('created_at', 'desc')->get()
                    );
        return view('hello', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = new Post;

        $post->title = Input::get('title');
        $post->content = Input::get('content');

        $post->save();

        return redirect('/hello');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array('post' => Post::find($id));
        return view('post', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array('post' => Post::find($id));
        return view('posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);

        $post->title = Input::get('title');
        $post->content = Input::get('content');

        $post->save();

        return redirect('/hello');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect('/hello');
    }
}
