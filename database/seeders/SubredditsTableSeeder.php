<?php

namespace Database\Seeders;

use App\Models\Subreddit;
use Illuminate\Database\Seeder;

class SubredditsTableSeeder extends Seeder {
    public function run() {
        Subreddit::create(['name' => 'World']);
        Subreddit::create(['name' => 'U.S.']);
        Subreddit::create(['name' => 'Technology']);
        Subreddit::create(['name' => 'Design']);
        Subreddit::create(['name' => 'Culture']);
        Subreddit::create(['name' => 'Business']);
        Subreddit::create(['name' => 'Politics']);
        Subreddit::create(['name' => 'Opinion']);
        Subreddit::create(['name' => 'Science']);
        Subreddit::create(['name' => 'Health']);
        Subreddit::create(['name' => 'Style']);
        Subreddit::create(['name' => 'Travel']);
    }
}