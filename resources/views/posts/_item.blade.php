<div class="post">
    <div class="card mb-4" id="post-{{ $post->id }}">
        <div class="card-body d-flex">
            <div>
                <p>{{ $post->upvotes()->count() }}</p>
                @auth
                    @if ($post->upvotes()->select('*')->where('user_id', Auth::user()->id)->first() == null)
                        <form action="{{ route('post.upvote', $post) }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ URL::current() }}#post-{{ $post->id }}"
                                name="redirect_url" />
                            <button class="btn btn-sm btn-success mt-4 mb-4" type="submit">
                                ↑
                            </button>
                        </form>
                    @else
                        <form action="{{ route('post.downvote', $post) }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ URL::current() }}#post-{{ $post->id }}"
                                name="redirect_url" />
                            <button class="btn btn-sm btn-danger mt-4 mb-4" type="submit">
                                ↓
                            </button>
                        </form>
                    @endif
                @endauth
            </div>
            <div class="ms-3 d-flex flex-column flex-grow-1">
                <h4 class="display-10">
                    <a href="{{ route('post.details', $post) }}">{{ $post->title }}</a>
                </h4>
                <p><a href="{{ route('profile.details', $post->author) }}">{{ $post->author->name }}</a> |
                    {{ $post->subreddit->name }} | {{ $post->updated_at->diffForHumans() }}
                </p>
                <p>Comments: {{ $post->comments()->count() }}</p>
            </div>
        </div>
    </div>
</div>
