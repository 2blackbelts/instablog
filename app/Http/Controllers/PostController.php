<?php

namespace instablog\Http\Controllers;

use Illuminate\Http\Request;

use instablog\Http\Requests;
use instablog\Http\Requests\CreatePostRequest;
use instablog\Http\Requests\UpdatePostRequest;
use instablog\Http\Controllers\Controller;
use instablog\Post;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

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
                    'posts'   => Post::orderby('created_at', 'desc')->simplePaginate(5)
                    );
        return view('home', $data);
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
        // dd(Auth::id());
        $post = new Post;

        $post->title = Input::get('title');
        $post->content = Input::get('content');
        $post->author_id = Auth::id();

        $post->save();

        return redirect('/home')->with('success', 'Woo! A new post.');
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
        return view('posts.single', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // Check if Auth user owns the post.
        if ($post->ownedByAuth()) {

            $data = array('post' => $post);
            return view('posts.edit', $data);

        } else {

            return back()->with('warning', 'You are not the owner of this post.');
        }
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

        // Check if Auth user owns the post.
        if ($post->ownedByAuth()) {

            $post->title = Input::get('title');
            $post->content = Input::get('content');

            $post->save();

            return redirect('/home')->with('success', 'Post was updated!');

        } else {
            // redirect to home page if not the owner
            return redirect('/')->with('warning', 'Permission Denied');

        }
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

        // Check if Auth user owns the post.
        if ($post->ownedByAuth()) {

            $post->delete();

            return redirect('/home')->with('success', 'Post was deleted. Sad to see it go...');

        } else {

            return redirect('/')->with('warning', 'Permission Denied');
        }
    }
}
