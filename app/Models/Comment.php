<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class,'author_id');
    }

    public function commentable() {
        return $this->morphTo();
    }

    public function upvotes() {
        return $this->morphMany(Upvote::class,'upvoteable');
    }

    public function replies() {
        return $this->morphMany(Comment::class,'commentable')->orderBy('created_at','desc');
    }
}
