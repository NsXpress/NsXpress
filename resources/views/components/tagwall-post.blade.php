<div {{ $attributes->merge(['class' => "card text-sm relative"]) }}>
    <div class="flex flex-col md:flex-row">
        <div class="w-full md:w-1/4 mr-2">
            <x-avatar :user="$post->user"/>
        </div>
    
        <div class="w-full md:w-3/4 mt-4 md:mt-0 flex flex-col justify-between break-words">
            @if ($post->user->isBot())
                <x-markdown>
                    {{ $post->message }}
                </x-markdown>
            @else
                {!! nl2br(strip_tags($post->message)) !!}
            @endhasanyrole
            <p class="text-[12px] text-zinc-600 mt-2 capitalize">{{ $post->created_at->toFormattedDateString() }} - {{ $post->created_at->diffForHumans() }}</p>
        </div>
    </div>
</div>