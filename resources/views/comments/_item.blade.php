<div class="comment">
    <div class="card mb-2" id="comment-{{$comment->id}}">
        <div class="card-body d-flex">
            <div>
                <p>{{ $comment->upvotes()->count() }}</p>
                @if ($comment->upvotes()->select('*')->where('user_id', Auth::user()->id)->first() == null)
                    <a class="btn btn-sm btn-success mt-4 mb-4" href="{{ route('comment.upvote', $comment) }}">
                        ↑
                    </a>
                @else
                    <a class="btn btn-sm btn-danger mt-4 mb-4" href="{{ route('comment.downvote', $comment) }}">
                        ↓
                    </a>
                @endif
            </div>
            <div class="ms-4">
                <p><b><a href="{{ route('profile.details', Auth::user()) }}">{{ $comment->user->name }}</a></b> |
                    {{ $comment->created_at->diffForHumans() }}</p>
                <p>{{ $comment->message }}</p>
                <p><a class="ms-auto relpybox-toggle" onclick="toggleReplyBox()">{{__('Reply')}}</a></p>
            </div>
        </div>
    </div>
    <div class="replies ms-5">
        @auth
        <form id="replyBox" class="mb-4" style="display: none" method="POST" action="{{ route('comment.reply', $comment) }}">
            @csrf
            <input type="hidden" value="{{URL::current()}}#comment-{{$comment->id}}" name="redirect_url"/>
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
