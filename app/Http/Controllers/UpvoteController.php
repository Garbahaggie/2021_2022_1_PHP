<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Upvote;
use App\Models\Post;
use App\Models\Comment;

class UpvoteController extends Controller
{
    public function upvotePost(Request $request, Post $post) {
        $upvote = new Upvote;

        $upvote->user_id = Auth::user()->id;

        $post->upvotes()->save($upvote);

        if ($request->redirect_url) {
            return redirect($request->redirect_url);
        }

        return back();
    }

    public function downvotePost(Request $request, Post $post) {
        $upvote = $post->upvotes()->select('*')->where('user_id', Auth::user()->id)->first();
        $post->upvotes()->delete($upvote);

        if ($request->redirect_url) {
            return redirect($request->redirect_url);
        }

        return back();
    }

    public function upvoteComment(Request $request, Comment $comment) {
        $upvote = new Upvote;

        $upvote->user_id = Auth::user()->id;

        $comment->upvotes()->save($upvote);

        if ($request->redirect_url) {
            return redirect($request->redirect_url);
        }

        return back();
    }

    public function downvoteComment(Request $request, Comment $comment) {
        $upvote = $comment->upvotes()->select('*')->where('user_id', Auth::user()->id)->first();
        $comment->upvotes()->delete($upvote);

        if ($request->redirect_url) {
            return redirect($request->redirect_url);
        }

        return back();
    }
}
