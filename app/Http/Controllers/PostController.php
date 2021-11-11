<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Subreddit;
use App\Models\Comment;

class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Subreddit $subreddit)
    {
        return view('posts.create')->with(compact('subreddit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Auth::user()
            ->posts()
            ->create($request->all());

        return redirect()
            ->route('post.details', $post)->with('success',__('Post posted!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show')->with(compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(Auth::user()->id != $post->author->id){
            return abort(403);
        }
        return view('posts.edit')->with(compact('post'));
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
        $post->update($request->except('_token'));

        return redirect()->route('post.edit',$post)
        ->with('success',__('Post edited!'));        
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

    public function comment(Request $request, Post $post){
        $request->validate([
            'comment'=>'required|max:250|min:5',
        ]);

        $comment = new Comment;

        $comment->author_id = Auth::user()->id;
        $comment->message = $request->comment;

        $post->comments()->save($comment);

        return back()
        ->with('success',__('Comment posted!'));
    }
}
