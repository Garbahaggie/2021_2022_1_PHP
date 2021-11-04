@extends('layouts.main')

@section('content')
<div class="row">
    @foreach ($allSubreddits as $subreddit)
        @include('subreddits._item')
    @endforeach
</div>
@endsection
