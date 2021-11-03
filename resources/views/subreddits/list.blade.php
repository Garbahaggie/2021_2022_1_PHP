@extends('layouts.main')

@section('content')
    @foreach ($allSubreddits as $subreddit)
        <div>
            <a class="p-2 link-secondary" href="{{ route('subreddit.details', $subreddit) }}">
                {{ $subreddit->name }}
            </a>
        </div>
    @endforeach
@endsection
