<?php

namespace instablog\Http\Controllers;

use Illuminate\Http\Request;

use instablog\Http\Requests;
use instablog\Http\Requests\CreatePostRequest;
use instablog\Http\Requests\UpdatePostRequest;
use instablog\Http\Controllers\Controller;
use instablog\Post;
use instablog\PostImage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use File;

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
        // dd($request);

        $post = new Post;

        $post->title = Input::get('title');
        $post->content = Input::get('content');
        $post->author_id = Auth::id();

        $post->save();

        if(Input::hasFile('image')) {

            $image = new PostImage;
            $image->filename = Input::file('image')->getClientOriginalName();
            $image->path = sha1(uniqid(mt_rand(), TRUE)) . "." . Input::file('image')->getClientOriginalExtension();
            $image->post_id = $post->id;

            Input::file('image')->move(public_path() . '/uploads/images', $image->path);

            $image->save();
        }

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

            if(Input::hasFile('image')) {

                $image = new PostImage;
                $image->filename = Input::file('image')->getClientOriginalName();
                $image->path = sha1(uniqid(mt_rand(), TRUE)) . "." . Input::file('image')->getClientOriginalExtension();
                $image->post_id = $post->id;

                Input::file('image')->move(public_path() . '/uploads/images', $image->path);

                $image->save();
            }
            
            return redirect('/post/' . $post->id)->with('success', 'Post was updated!');

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

    public function getImage($id)
    {
        // Find the image and show it to the user. Confirm delete?
        $data = array('image' => PostImage::find($id));
        return view('posts.image', $data);
    }

    public function deleteImage($id)
    {
        // Delete the image (server, database)
        // return "Ready to delete";

        $image = PostImage::find($id);

        if(File::exists(public_path() . '/uploads/images/' . $image->path))
        {
            File::delete(public_path() . '/uploads/images/' . $image->path);
            $image->delete();
        }

        return redirect('/home')->with('success', 'Image was deleted.');
    }
    
}
