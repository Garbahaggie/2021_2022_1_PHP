<div class="card mb-4">
    <div class="card-body d-flex">        
        <div>
            <p>{{ $post->upvotes()->count() }}</p>
            <button class="btn btn-sm btn-success">↑</button>
        </div>
        <div class="ms-3 d-flex flex-column flex-grow-1">
            <h4 class="display-10">
                <a href="{{route('post.details',$post)}}">{{ $post->title }}</a>
            </h4>
            <p>{{ $post->author->name }} | {{ $post->subreddit->name }} | {{ $post->updated_at->diffForHumans() }}
            </p>
            <p>Comments: {{$post->comments()->count()}}</p>
        </div>
    </div>
</div>
