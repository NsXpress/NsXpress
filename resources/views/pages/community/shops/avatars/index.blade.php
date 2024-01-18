<x-app-layout>
    <div class="mt-4 flex flex-col justify-between md:flex-row">
        <div class="w-full md:w-1/4">
            <x-avatar-coins :user="$user" />
        </div>
    
        <div class="mt-4 w-full md:mt-0 md:w-3/4 md:pl-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @forelse ($avatars as $avatar)
                    <div class="card">
                        <div class="flex flex-col">
                            <div>
                                <img alt="{{ $avatar->name }}" src="{{ asset('storage/images/community/avatars/' . $user->gender . '/' . $avatar->image . '') }}" class="mx-auto flex-shrink-0 object-cover object-top">
                            </div>

                            <div class="mt-2 text-center flex flex-col text-sm text-zinc-600">
                                <span class="font-heading font-semibold tracking-tight text-zinc-800 capitalize">{{ $avatar->name }}</span>
                                <span class="mt-0.5">{{ $avatar->description }}</span>
                                
                                <p class="font-black text-lg mt-4">
                                    {{ number_format($avatar->price, 0, ",", ".") }} <span class="text-sm text-gray-600">/ mønter</span>
                                </p>

                                <div class="mt-4">
                                    @if ($user->avatars()->where('avatar_id', $avatar->id)->exists())
                                        <p class="text-red-500">Du ejer allerede denne figur.</p>
                                    @else
                                        @if ($user->coins >= $avatar->price)
                                            <form action="{{ route('pages.community.shops.avatars.purchase', $avatar) }}" method="POST">
                                                @csrf

                                                <x-button type="submit">Køb figur</x-button>
                                            </form>
                                        @else
                                            <p class="text-red-500">Du har ikke råd.</p>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Der er desværre ingen varer i butikken.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>