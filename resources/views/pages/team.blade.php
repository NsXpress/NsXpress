<x-app-layout>
    <div class="mt-4">
        <h1 class="mb-2 font-heading text-xl font-semibold tracking-tight text-zinc-800">Redaktionen</h1>

        <div class="text-sm text-zinc-600">
            <p class="mb-2">Mød holdet bag {{ config('app.name') }}.</p>

            <p class="mb-2">
                Vi er stolte af at præsentere dig for det dedikerede team bag {{ config('app.name') }} - din kilde til nostalgiske Netstations-fansider fra chat-æraens storhedstid.
                Vores mål er at levere den ultimative oplevelse til alle, der værdsætter denne ikoniske æra.
            </p>
        </div>
    </div>

    @foreach ($roles as $role => $users)
        <div class="my-4">
            <h2 class="mb-4 font-heading text-lg font-semibold capitalize tracking-tight text-gray-700">{{ $role }}</h2>

            <div class="mb-4 grid grid-cols-1 md:grid-cols-3 md:gap-4">
                @foreach ($users as $user)
                    <a href="{{ route('pages.community.profile.show', $user) }}">
                        <div class="card mb-4 md:mb-0">
                            <div class="mx-auto text-center">
                                <div class="flex-shrink-0">
                                    <img class="mx-auto flex-shrink-0 object-cover object-top" src="{{ asset('storage/images/community/avatars/' . $user->gender . '/' . $user->getAvatar()->image) }}" alt="{{ $user->username }}">
                                </div>

                                <div class="mt-2 flex flex-col text-center">
                                    <span class="capitalize text-zinc-800">{{ $user->username }}</span>
                                    <span class="mt-0.5 text-sm font-semibold capitalize">{{ $role }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach
</x-app-layout>
