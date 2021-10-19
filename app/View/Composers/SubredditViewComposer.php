<?php

namespace App\View\Composers;

use App\Models\Subreddit;
use Illuminate\View\View;

class SubredditViewComposer {
    public function compose(View $view)
    {
        $subreddits = Subreddit::orderBy('name')->get();
        $view->with('subreddits', $subreddits);
    }
}