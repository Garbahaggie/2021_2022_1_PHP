<?php

namespace App\View\Composers;

use Auth;
use App\Models\Subreddit;
use Illuminate\View\View;

class SubredditViewComposer
{
    public function compose(View $view)
    {
        $subreddits = null;
        if (Auth::user() != null)
            $subreddits = Auth::user()->subscriptions()->get();
        //$subreddits = Subreddit::orderBy('name')->get();
        $view->with('subreddits', $subreddits);
    }
}
