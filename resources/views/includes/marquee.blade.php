<div class="hidden md:block p-2 border border-gray-300 bg-white bg-opacity-10 text-[10px] md:text-xs max-w-full">
    <div class="bg-white flex items-center">
        <div class="px-4 py-2 bg-[#527993] text-white font-semibold">Seneste nyheder</div>
        <div class="md:w-[350px] overflow-hidden" id="marquee">
            @foreach ($lastestArticles as $article)
                <a href="{{ route('pages.articles.show', $article) }}" class="border-r border-zinc-300 px-2">{{ Str::limit($article->headline, 50, '..') }}</a>
            @endforeach
        </div>
    </div>
</div>