<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class ProfileController extends Controller
{
    public function show(User $user) {
        $posts = $user->posts()->paginate(10);
        return view('profile.show')->with(compact('user','posts'));
    }
}
