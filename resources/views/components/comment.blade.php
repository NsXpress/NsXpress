<div {{ $attributes->merge(['class' => "card text-sm relative"]) }}>
    <div class="flex flex-col md:flex-row">
        <div class="w-full md:w-1/4 mr-2">
            <x-avatar :user="$comment->user"/>
        </div>
    
        <div class="w-full md:w-3/4 mt-4 md:mt-0">
            {!! nl2br(strip_tags($comment->content)) !!}
            <p class="text-[9px] text-zinc-600 mt-2 capitalize">{{ $comment->created_at->toFormattedDateString() }} - {{ $comment->created_at->diffForHumans() }}</p>
        </div>
    </div>
</div>