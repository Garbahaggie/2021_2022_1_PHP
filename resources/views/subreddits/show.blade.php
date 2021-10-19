@extends('layouts.main')

@section('content')
    <h1 class="text-center mb-5">{{ $subreddit->name }}</h1>
    <a class="btn btn-sm btn-success ms-2" href="{{route('post.create', $subreddit) }}">
        {{__('Post in this subreddit')}}
    </a>
    @if ($posts->count())
        <div class="row">
            <div class="col-md-6 mx-auto">
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
