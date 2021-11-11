<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function comment(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required|max:250|min:1',
        ]);

        $comment = new Comment;

        $comment->author_id = Auth::user()->id;
        $comment->message = $request->comment;

        $post->comments()->save($comment);

        return back()
            ->with('success', __('Comment posted!'));
    }

    public function reply(Request $request, Comment $comment)
    {
        $request->validate([
            'message' => 'required|max:250|min:1',
        ]);

        $reply = new Comment;

        $reply->author_id = Auth::user()->id;
        $reply->message = $request->message;

        $comment->replies()->save($reply);

        if ($request->redirect_url) {
            return redirect($request->redirect_url)
                ->with('success', __('Reply posted!'));
        }

        return back()
            ->with('success', __('Reply posted!'));
    }
}
