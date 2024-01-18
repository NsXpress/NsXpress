<x-app-layout>
    <div class="card text-sm mt-4">
        <h1 class="text-xl font-heading font-semibold tracking-tight text-zinc-800">Garderobe</h1>

        <hr class="mt-4 mb-6">

        <div x-data="{ selectedAvatar: {{ $user->getAvatar()->id }} }">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($avatars as $avatar)
                    <div
                        x-bind:class="{ 'bg-blue-100': selectedAvatar === {{ $avatar->id }} }"
                        class="p-4 border border-zinc-200 shadow cursor-pointer"
                        data-avatar-id="{{ $avatar->id }}"
                        @click="selectedAvatar = {{ $avatar->id }}; $nextTick(() => $refs.avatarInput.focus())"
                    >
                        <img src="{{ asset('storage/images/community/avatars/' . $user->gender . '/' . $avatar->image) }}" alt="User avatar" class="mx-auto flex-shrink-0 object-none object-center">
                        
                        <div class="mt-2 text-center flex flex-col">
                            <span class="text-zinc-800 capitalize">{{ $avatar->name }}</span>
                            <span class="text-zinc-600 text-xs mt-0.5">{{ $avatar->description }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <form action="#" method="POST" class="mt-6">
                @csrf
    
                <input type="hidden" name="avatar_id" x-bind:value="selectedAvatar">
    
                <x-button class="block mx-auto" type="submit">Gem avatar</x-button>
            </form>
        </div>
    </div>
</x-app-layout>