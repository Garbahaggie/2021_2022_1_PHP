<div class="card mb-4">
    <div class="card-body d-flex">
        <div>
            <p>{{ $post->upvotes()->count() }}</p>
            @auth
                @if ($post->upvotes()->select('*')->where('user_id', Auth::user()->id)->first() == null)
                    <a class="btn btn-sm btn-success mt-4 mb-4" href="{{ route('post.upvote', $post) }}">
                        ↑
                    </a>
                @else
                    <a class="btn btn-sm btn-danger mt-4 mb-4" href="{{ route('post.downvote', $post) }}">
                        ↓
                    </a>
                @endif
            @endauth
        </div>
        <div class="ms-3 d-flex flex-column flex-grow-1">
            <h4 class="display-10">
                <a href="{{ route('post.details', $post) }}">{{ $post->title }}</a>
            </h4>
            <p><a href="{{route('profile.details',Auth::user())}}">{{ $post->author->name }}</a> | {{ $post->subreddit->name }} | {{ $post->updated_at->diffForHumans() }}
            </p>
            <p>Comments: {{ $post->comments()->count() }}</p>
        </div>
    </div>
</div>
