<x-app-layout>
    @isset($featured_article)
        <div class="mt-4 border border-zinc-400 bg-white bg-opacity-10 p-2 text-white">
            <div class="p-6" style='background:url({{ asset('storage/' . $featured_article->getImage()) }}) no-repeat center top / cover'>
                <div class="bg-black/70 p-4 backdrop-blur-sm">
                    <a href="{{ route('pages.articles.show', $featured_article) }}">
                        <h2 class="mb-5 font-heading text-3xl font-bold tracking-tight underline decoration-zinc-100/10 underline-offset-4 md:text-5xl">{{ $featured_article->headline }}</h2>

                        <div class="mb-4 flex">
                            @foreach ($featured_article->categories as $category)
                                <span class="mr-2 rounded bg-blue-600 px-2 py-1 text-xs capitalize">{{ $category->name }}</span>
                            @endforeach
                        </div>

                        <p class="mb-8 text-sm text-gray-50 md:text-lg hidden md:block">{{ Str::limit($featured_article->excerpt, 250, '..') }}</p>
                    </a>

                    <div class="flex flex-col md:flex-row md:items-end justify-between text-sm">
                        <x-avatar :user="$featured_article->user" hideStatusIndicator=true />

                        <div class="flex items-center text-xs mt-4 md:mt-0 md:text-sm">
                            <x-heroicon-o-clock class="mr-2 h-4 w-4" />

                            <p>{{ $featured_article->published_at->toFormattedDateString() }} • {{ $featured_article->published_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endisset

    <div class="mt-4 flex flex-col">
        @forelse ($articles as $article)
            @if(!($loop->first && $articles->onFirstPage()))
                <a href="{{ route('pages.articles.show', $article) }}">
                    <div class="flex flex-col md:flex-row">
                        <img class="hidden border border-zinc-400 bg-white bg-opacity-10 p-2 md:block md:w-36" src="{{ asset('storage/' . $article->getImage()) }}" alt="{{ $article->headline }}">

                        <div class="flex flex-col md:pl-4">
                            <h3 class="mb-2 font-heading text-xl font-bold leading-tight tracking-tight text-zinc-900 md:mb-0 md:leading-relaxed">{{ $article->headline }}</h3>

                            <p class="flex-grow text-sm text-zinc-600">{{ Str::limit($article->excerpt, 250, '..') }}</p>

                            <div class="mt-2 flex text-xs text-zinc-500">
                                <p>
                                    <span class="font-semibold text-zinc-600">Journalist</span>: {{ $article->user->username }}
                                </p>

                                <p class="pl-4">
                                    <span class="font-semibold text-zinc-600">Publiceret</span>: {{ $article->published_at->toFormattedDateString() }} • {{ $article->published_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>

                <hr class="my-4">
            @endif
        @empty
            <h1 class="mb-2 font-heading text-xl font-semibold tracking-tight text-zinc-800">Hovsa! Det her er lidt pinligt.</h1>

            <div class="text-sm text-zinc-600">
                <p class="mb-4">
                    Vi har ikke nogen artikler endnu! Kig tilbage senere.
                </p>
            </div>
        @endforelse
    </div>

    {{ $articles->onEachSide(5)->links() }}
</x-app-layout>
