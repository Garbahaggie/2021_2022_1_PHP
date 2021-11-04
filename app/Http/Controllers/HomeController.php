<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Subreddit;

class HomeController extends Controller
{
    public function index() {
        $posts = new \Illuminate\Database\Eloquent\Collection;;
        if (Auth::user() != null) {
            $ids = collect([]);
            $subreddits = Auth::user()->subscriptions()->get();         
            foreach ($subreddits as $subreddit) {
                $ids[] = ($subreddit->id);               
            }
            $posts = Post::whereIn('subreddit_id',$ids)->orderBy('created_at','desc')->paginate(10);
        }
        else {
            $posts = Post::orderBy('created_at','desc')->paginate(10);
        }
        
        return view('home')->with(compact('posts'));
    }
}
