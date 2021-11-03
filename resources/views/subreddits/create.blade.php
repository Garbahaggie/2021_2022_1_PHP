@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="display-4">{{ __('Create new subreddit:')}}</h4>
    </div>
    
    <div class="card-body">
        <form action="{{ route('subreddit.create') }}" method="POST">
            @csrf
            <div class="mb-3">
                <x-form.input name="name" label="{{ __('Name') }}" />
            </div>
            <div>
                <button class="btn btn-primary btn-lg">{{ __('Create') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
