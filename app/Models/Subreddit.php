<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subreddit extends Model
{
    use HasFactory;

    protected $fillable= [
        'name',
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function subscribers() {
        return $this->belongsToMany(User::class);
    }
}
