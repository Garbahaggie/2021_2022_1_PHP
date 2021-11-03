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

    public function showAll() {
        $allSubreddits = Subreddit::orderBy('name')->get();
        return view('subreddits.list')->with(compact('allSubreddits'));
    }

    public function subscribe(Subreddit $subreddit) {
        Auth::user()->subscriptions()->attach($subreddit);
        return back();
    }

    public function unsubscribe(Subreddit $subreddit) {
        Auth::user()->subscriptions()->detach($subreddit);
        return back();
    }
}
