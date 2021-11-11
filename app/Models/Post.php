<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable= [
        'title','body', "subreddit_id"
    ];

    public function subreddit() {
        return $this->belongsTo(Subreddit::class);
    }

    public function author() {
        return $this->belongsTo(User::class,'author_id');
    }

    public function comments() {
        return $this->morphMany(Comment::class,'commentable')->orderBy('created_at','desc');
    }

    public function upvotes() {
        return $this->morphMany(Upvote::class,'upvoteable');
    }
}
