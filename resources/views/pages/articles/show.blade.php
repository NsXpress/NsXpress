<x-app-layout>
    <div class="mt-4 border border-zinc-400 bg-white bg-opacity-10 p-2 text-white">
        <div class="p-6" style='background:url({{ asset('storage/' . $article->getImage()) }}) no-repeat center top / cover'>
            <div class="bg-black/70 p-4 backdrop-blur-sm">
                <h2 class="text-3xl font-bold tracking-tight underline decoration-zinc-100/10 underline-offset-4 md:text-5xl">
                    {{ $article->headline }}
                </h2>

                <div class="mt-4 flex">
                    @foreach ($article->categories as $category)
                        <span class="mr-2 rounded bg-blue-600 px-2 py-1 text-xs capitalize">{{ $category->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 flex flex-col justify-between md:flex-row">
        <div class="w-full md:w-1/4">
            <div class="border border-zinc-400 p-4">
                <x-avatar :user="$article->user" hideStatusIndicator=true />

                <div class="mt-4 flex flex-col text-[11px] text-zinc-600">
                    <p class="flex justify-between">
                        <strong>Kommentarer:</strong> {{ $article->comments->count() }}
                    </p>

                    <p class="mt-2 flex justify-between">
                        <strong class="pr-2">Visninger:</strong> {{ $article->views }}
                    </p>

                    <p class="mt-2 flex justify-between">
                        <strong class="pr-2">Publiceret:</strong> {{ $article->published_at->toFormattedDateString() }}
                    </p>
                </div>
            </div>
        </div>

        <div class="markdown-content mt-4 w-full md:mt-0 md:w-3/4 md:pl-6">
            <x-markdown>
                {{ $article->content }}
            </x-markdown>
        </div>
    </div>

    @if ($article->comments->count() > 0 || auth()->check())
        <hr class="mb-6 mt-2">
    @endif

    @guest
        <p class="mb-6 text-center">Du skal være logget ind for at kunne skrive en kommentar.</p>
    @endguest

    @auth
        <div class="card mb-4">
            <form action="{{ route('pages.articles.comment.store', $article) }}" method="POST">
                @csrf

                <x-textarea name="comment" label="Kommentar"></x-textarea>

                <x-button type="submit">Send kommentar</x-button>
            </form>
        </div>
    @endauth

    @if ($article->comments->count() > 0)
        @foreach ($article->comments as $comment)
            <x-comment class="mb-4" :comment="$comment" />
        @endforeach
    @endif
</x-app-layout>
