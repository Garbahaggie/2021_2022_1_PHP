<div class="card mb-4">
    <div class="card-body d-flex">
        <h1 class="display-1">{{ $post->title }}</h1>
        <p>{{ $post->author->name }} | {{ $post->subreddit->name }} | {{ $post->updated_at->diffForHumans() }}</p>
        <div>
            {!! $post->body !!}
        </div>
        <div>
            {{$post->upvoters()->count()}}
        </div>
    </div>
</div>
