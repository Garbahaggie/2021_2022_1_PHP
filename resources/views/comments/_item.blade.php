<div class="comment">
    <div class="card mb-2" id="comment-{{ $comment->id }}">
        <div class="card-body d-flex">
            <div>
                <p>{{ $comment->upvotes()->count() }}</p>
                @auth
                    @if ($comment->upvotes()->select('*')->where('user_id', Auth::user()->id)->first() == null)
                        <form action="{{ route('comment.upvote', $comment) }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ URL::current() }}#comment-{{ $comment->id }}"
                                name="redirect_url" />
                            <button class="btn btn-sm btn-success mt-4 mb-4" type="submit">
                                ↑
                            </button>
                        </form>
                    @else
                        <form action="{{ route('comment.downvote', $comment) }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ URL::current() }}#comment-{{ $comment->id }}"
                                name="redirect_url" />
                            <button class="btn btn-sm btn-danger mt-4 mb-4" type="submit">
                                ↓
                            </button>
                        </form>
                    @endif
                @endauth
            </div>
            <div class="ms-4">
                <p><b><img class="rounded-circle" width="16" src="{{ $comment->user->avatar }}" alt="{{ $comment->user->name }}"> <a href="{{ route('profile.details', $comment->user) }}">{{ $comment->user->name }}</a></b> |
                    {{ $comment->created_at->diffForHumans() }}</p>
                <p>{{ $comment->message }}</p>
                <p><a class="ms-auto replybox-toggle" onclick="toggleReplyBox({{$comment->id}})">{{ __('Reply') }}</a></p>
            </div>
        </div>
    </div>
    <div class="replies ms-5">
        @auth
            <form id="replyBox-{{$comment->id}}" class="mb-4" style="display: none" method="POST"
                action="{{ route('comment.reply', $comment) }}">
                @csrf
                <input type="hidden" value="{{ URL::current() }}#comment-{{ $comment->id }}" name="redirect_url" />
                <div class="mb-1">
                    <textarea class="form-control" name="message"
                        placeholder="{{ __('Write your reply here!') }}"></textarea>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit">
                        {{ __('Post reply') }}
                    </button>
                </div>
            </form>
        @endauth
        @foreach ($comment->replies as $reply)
            @include('comments._item',['comment' => $reply])
        @endforeach
    </div>
</div>
