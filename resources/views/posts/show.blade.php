@extends('layouts.main')

@section('content')
    <h1 class="display-4">{{ $post->title }}</h1>
    <p style="color: gray"> <img class="rounded-circle" width="16" src="{{ $post->author->avatar }}" alt="{{ $post->author->name }}">  <a href="{{ route('profile.details', $post->author) }}">{{ $post->author->name }}</a> |
        <a href="{{route('subreddit.details', $post->subreddit)}}">{{ $post->subreddit->name }}</a> | {{ $post->updated_at->diffForHumans() }}
        @auth
            @if ($post->author == Auth::user())
                | <a href="{{ route('post.edit', $post) }}">edit</a>
                | <a href="{{ route('post.delete', $post) }}">delete</a>
            @endif
        @endauth
    </p>
    <div>
        <p style="font-size: 20pt">{{ $post->body }}</p>
    </div>
    <div>
        @auth
            @if ($post->upvotes()->select('*')->where('user_id', Auth::user()->id)->first() == null)
                <form action="{{ route('post.upvote', $post) }}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-success mt-4 mb-4" type="submit">
                        {{ __('Upvote this post') }}
                    </button>
                </form>
            @else
                <form action="{{ route('post.downvote', $post) }}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-danger mt-4 mb-4" type="submit">
                        {{ __('Downvote this post') }}
                    </button>
                </form>
            @endif
        @endauth
        | Number of upvotes: {{ $post->upvotes()->count() }}
        <hr>
    </div>
    <div style="margin-left: 20px" class="row mt-4">
        <p>{{ __('Comments:') }}</p>
        @auth
            <form class="mb-4" method="POST" action="{{ route('post.comment', $post) }}">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" name="comment"
                        placeholder="{{ __('Write your comment here!') }}"></textarea>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">
                        {{ __('Post comment') }}
                    </button>
                </div>
            </form>
        @endauth
        @foreach ($post->comments as $comment)
            @include('comments._item')
        @endforeach

    </div>
@endsection
