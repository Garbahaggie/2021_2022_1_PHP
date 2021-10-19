<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subreddit;

class SubredditController extends Controller
{
    public function show(Subreddit $subreddit)
    {
        $posts = $subreddit->posts()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('subreddits.show')
            ->with(compact('subreddit', 'posts'));
    }
}
