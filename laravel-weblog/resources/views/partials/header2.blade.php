<header class="mb-4 lg:mb-6 not-format">
    <address class="flex items-center mb-6 not-italic">
        <div class="inline-flex items-center mr-3 text-sm text-gray-900">
            <img class="mr-4 w-16 h-16 rounded-full" src="{{ asset('storage/' . $article->user->profile_picture) }}" alt="{{ $article->user->name }}">
            <div>
                <a href="#" rel="author" class="text-xl font-bold text-gray-900">{{ $article->user->name }}</a>
                <p class="text-base text-gray-500">Graphic Designer, educator</p>
                <p class="text-base text-gray-500"><time pubdate datetime="2022-02-08" title="February 8th, 2022">{{ $article->created_at->format('M d, Y') }}</time></p>
            </div>
        </div>
    </address>
    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl">@yield('title', 'Default Title')</h1>
</header>