<div class="relative w-full py-2 px-3 mb-8 border border-zinc-400 hover:border-zinc-500 rounded-none">
    <span class="absolute bottom-full left-0 ml-3 -mb-1 transform translate-y-0.5 text-xs px-1 font-semibold bg-white">{{ $label }}</span>
    <textarea {{ $attributes }} class="block w-full outline-none bg-transparent text-sm h-60">{{ $slot }}</textarea>
</div>