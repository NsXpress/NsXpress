<div {{ $attributes->merge(['class' => "capitalize"]) }}>
    @if ($user->isOnline())
        <div class="flex items-center">
            <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>
            <strong class="text-emerald-500">Online</strong>
        </div>
    @else
        <div class="flex items-center">
            <span class="w-2 h-2 bg-red-500 rounded-full mr-1"></span>
            <strong class="text-red-400">Offline</strong>
        </div>
    @endif
</div>