@extends('layouts.main')

@section('content')
<h1 class="display-1">{{ $post->title }}</h1>
<p>{{ $post->author->name }} | {{ $post->subreddit->name }} | {{ $post->updated_at->diffForHumans() }}</p>
<div>
    {{ $post->body }}
</div>
@endsection
