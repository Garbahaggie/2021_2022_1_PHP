@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="display-4">{{ __('Edit post: ')}} {{$post->title}}</h4>
    </div>
    
    <div class="card-body">
        <form action="{{ route('post.edit',$post) }}" method="POST">
            @csrf
            <input type="hidden" name="subreddit_id" value="{{$post->subreddit->id}}">
            <div class="mb-3">
                <x-form.input name="title" label="{{ __('Title') }}" :value="$post->title" />
            </div>
            <div class="mb-3">
                <label for="body">{{ __('Post body') }}</label>
                <textarea name="body" class="form-control" rows="8">{{old('body',$post->body)}}</textarea>
            </div>
            <div>
                <button class="btn btn-primary btn-lg">{{ __('Update') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
