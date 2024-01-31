<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $url = route('posts');
        return view(basename($url), ["posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = route('create_post');
        return view(basename($url));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $title = htmlspecialchars($request->input('title'));
        $body = htmlspecialchars($request->input('body'));

        $post = new Post;
        $post->title = $title;
        $post->body = $body;
        $post->user_id = $request->user()->id;
        $post->save();
        
        $request->session()->flash('post_saved', 'Your post has been saved.');

        $url = route('view_post', ['post'=>$post->id]);
        return redirect($url);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $url = route('view_post', ['post'=>$post->id]);
        $url = basename(dirname($url));
        return view($url, ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $url = route('edit_post', ['post'=>$post->id]);
        $url = basename(dirname($url));
        return view($url, ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if($post->user->id == $request->user()->id) {
            $post->title = htmlspecialchars($request->input('title'));
            $post->body = htmlspecialchars($request->input('body'));
            $post->save();

            $request->session()->flash('post_updated', 'Your post has been updated.');
        }

        $url = route('view_post', ['post'=>$post->id]);
        return redirect($url);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Request $request)
    {
        if($post->user->id == $request->user()->id) {
            $post->delete();
            $request->session()->flash('post_deleted', 'Your post has been deleted.');
        }

        $url = route('posts');
        return redirect(basename($url));
    }
}
