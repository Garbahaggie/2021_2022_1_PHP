@extends('layouts.main')

@section('content')
    <h1 class="text-center mb-5">{{ $subreddit->name }}</h1>
    @auth
        <a class="btn btn-sm btn-success ms-2 mb-4" href="{{ route('post.create', $subreddit) }}">
            {{ __('Post in this subreddit') }}
        </a>
        @if ($subreddit->subscribers()->select('*')->where('user_id', Auth::user()->id)->first() == null)
            <a class="btn btn-sm btn-info ms-2 mb-4" href="{{ route('subreddit.subscribe', $subreddit) }}">
                {{__('Subscribe to this subreddit')}}
            </a>
        @else
            <a class="btn btn-sm btn-warning ms-2 mb-4" href="{{ route('subreddit.unsubscribe', $subreddit) }}">
                {{__('Unsubscribe from this subreddit')}}
            </a>
        @endif
    @endauth
    @if ($posts->count())
        <div class="row">
            <div class="mx-auto">
                @foreach ($posts as $post)
                    @include('posts._item')
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    @else
        <div class="alert alert-warning">
            {{ __('No posts to show') }}
        </div>
    @endif
@endsection
