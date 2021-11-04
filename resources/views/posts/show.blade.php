@extends('layouts.main')

@section('content')
    <h1 class="display-4">{{ $post->title }}</h1>
    <p style="color: gray"> <a href="{{route('profile.details',Auth::user())}}">{{ $post->author->name }}</a> | {{ $post->subreddit->name }} | {{ $post->updated_at->diffForHumans() }}</p>
    <div>
        <p style="font-size: 20pt">{{ $post->body }}</p>
    </div>
    <div>
        @auth
            @if ($post->upvotes()->select('*')->where('user_id', Auth::user()->id)->first() == null)
                <a class="btn btn-sm btn-success mt-4 mb-4" href="{{ route('post.upvote', $post) }}">
                    {{ __('Upvote this post') }}
                </a>
            @else
                <a class="btn btn-sm btn-danger mt-4 mb-4" href="{{ route('post.downvote', $post) }}">
                    {{ __('Downvote this post') }}
                </a>
            @endif
        @endauth
        |   Number of upvotes: {{ $post->upvotes()->count() }}
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
            <div class="card mb-2">
                <div class="card-body d-flex">
                    <div>
                        <p>{{ $comment->upvotes()->count() }}</p>
                        @if ($comment->upvotes()->select('*')->where('user_id', Auth::user()->id)->first() == null)
                            <a class="btn btn-sm btn-success mt-4 mb-4" href="{{ route('comment.upvote', $comment) }}">
                                ↑
                            </a>
                        @else
                            <a class="btn btn-sm btn-danger mt-4 mb-4" href="{{ route('comment.downvote', $comment) }}">
                                ↓
                            </a>
                        @endif
                    </div>
                    <div class="ms-4">
                        <p><b><a href="{{route('profile.details',Auth::user())}}">{{ $comment->user->name }}</a></b> | {{ $comment->created_at->diffForHumans() }}</p>
                        <p>{{ $comment->message }}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
