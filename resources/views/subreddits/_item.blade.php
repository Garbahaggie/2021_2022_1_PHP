
    <div class="col-sm-6">
        <div class="card mb-4">
            <div class="card-body d-flex">
                <div class="ms-3 d-flex flex-column flex-grow-1">
                    <h4 class="display-10">
                        <a href="{{ route('subreddit.details', $subreddit) }}">{{ $subreddit->name }}</a>
                    </h4>
                    <p>Number of subscribers: {{ $subreddit->subscribers()->count() }}</p>
                    <p>Number of posts: {{ $subreddit->posts()->count() }}</p>
                </div>
            </div>
        </div>
    </div>
