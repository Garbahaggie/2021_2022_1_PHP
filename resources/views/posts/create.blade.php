@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="display-4">{{ __('Post in')}} {{$subreddit->name}}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('post.create') }}" method="POST">
            @csrf
            <input type="hidden" name="subreddit_id" value="{{$subreddit->id}}">
            <div class="mb-3">
                <x-form.input name="title" label="{{ __('Title') }}" />
            </div>
            <div class="mb-3">
                <label for="body">{{ __('Post body') }}</label>
                <textarea name="body" class="form-control" rows="8"></textarea>
            </div>
            <div>
                <button class="btn btn-primary btn-lg">{{ __('Post') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
