@extends('layouts.main')

@section('content')
@auth
<h1 class="text-center mb-5">{{ __('Recent posts from your subscribed subreddits') }}</h1>
@else
<h1 class="text-center mb-5">{{ __('Posts from all over Olvastm, take a look around!') }}</h1>
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