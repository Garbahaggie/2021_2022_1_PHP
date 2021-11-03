<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="link-secondary" href="{{ route('subreddit.list') }}">{{ __('Show all subreddits') }}</a> | 
                <a class="link-secondary" href="{{ route('subreddit.create') }}">{{ __('Create a new subreddit') }}</a>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="{{ route('home') }}">Olvastm</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="link-secondary" href="#" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img"
                        viewBox="0 0 24 24">
                        <title>Search</title>
                        <circle cx="10.5" cy="10.5" r="7.5"></circle>
                        <path d="M21 21l-5.2-5.2"></path>
                    </svg>
                </a>
                @auth
                    <span>
                        {{ Auth::user()->name }}
                    </span>
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-link" type="submit">
                            {{ __('Sign out') }}
                        </button>
                    </form>
                @else
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('auth.login') }}">
                        {{ __('Sign in') }}
                    </a>
                    <a class="btn btn-sm btn-success ms-3" href="{{ route('auth.register') }}">
                        {{ __('Sign up') }}
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex">
            @if ($subreddits == null)
                {{ __('Subscribe to some subreddits to see them here!') }}
            @else
                @foreach ($subreddits as $subreddit)
                    <a class="p-2 link-secondary" href="{{ route('subreddit.details', $subreddit) }}">
                        {{ $subreddit->name }}
                    </a>
                @endforeach
            @endif
        </nav>
    </div>
