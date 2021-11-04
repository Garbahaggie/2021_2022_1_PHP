@extends('layouts.main')

@section('content')
    <h1 class="display-4">{{ $user->name }}</h1>    
    <div>
        <p style="color: gray"> Subscriptions: {{ $user->subscriptions()->count() }} | Posts: {{ $user->posts()->count() }} | Comments: {{ $user->comments()->count()}} | Upvotes: {{$user->upvotes()->count()}}</p>
        <hr>
    </div>
    <div style="margin-left: 20px" class="row mt-4">
        <p>{{ __('Posts:') }}</p>
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

    </div>
@endsection
