<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Upvote;
use App\Models\Post;
use App\Models\Comment;

class UpvoteController extends Controller
{
    public function upvotePost(Post $post) {
        $upvote = new Upvote;

        $upvote->user_id = Auth::user()->id;

        $post->upvotes()->save($upvote);

        return back();
    }

    public function downvotePost(Post $post) {
        $upvote = $post->upvotes()->select('*')->where('user_id', Auth::user()->id)->first();
        $post->upvotes()->delete($upvote);

        return back();
    }

    public function upvoteComment(Comment $comment) {
        $upvote = new Upvote;

        $upvote->user_id = Auth::user()->id;

        $comment->upvotes()->save($upvote);

        return back();
    }

    public function downvoteComment(Comment $comment) {
        $upvote = $comment->upvotes()->select('*')->where('user_id', Auth::user()->id)->first();
        $comment->upvotes()->delete($upvote);

        return back();
    }
}
