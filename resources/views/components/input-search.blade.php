<div class="relative w-full py-2 px-3 mb-8 border border-zinc-400 hover:border-zinc-500 rounded-none">
    <span class="absolute bottom-full left-0 ml-3 -mb-1 transform translate-y-0.5 text-xs px-1 font-semibold bg-white">{{ $label}}</span>
    <input {{ $attributes }} class="block w-full outline-none bg-transparent text-sm">
    
    <button type="submit" class="absolute right-0 top-0 mt-2 mr-3">
        <svg class="h-5 w-5"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </button>
</div>