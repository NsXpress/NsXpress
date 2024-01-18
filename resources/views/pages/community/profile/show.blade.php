<x-app-layout>
    <div class="card text-sm mt-4">
        <div class="p-4">
            <div class="flex flex-row justify-between items-start py-2">
                <div class="md:mb-8 break-words">
                    <h1 class="text-2xl font-bold tracking-tight text-zinc-800 md:text-4xl capitalize">
                        {{ $user->username }}
                    </h1>

                    <p class="text-lg text-zinc-600 capitalize">
                        {{ $user->getRole() }}
                    </p>

                    <x-online-indicator :user="$user" class="text-xs" />
                </div>

                <!-- Avatar -->
                <div class="flex flex-col items-center justify-start">
                    <img src="{{ asset('storage/images/community/avatars/' . $user->gender . '/' . $user->getAvatar()->image) }}">
                </div>
            </div>

            <div class="flex items-center justify-between text-sm mb-2">
                <strong class="text-zinc-600 font-semibold">Bruger på Netstationen:</strong>
                <span>{{ $user->ns_username ?? 'Ikke angivet.' }}</span>
            </div>

            <hr class="my-4">

            <div class="flex items-center justify-between text-sm mb-2">
                <strong class="text-zinc-600 font-semibold">Navn:</strong>
                <span>{{ $user->name ?? 'Ikke angivet.' }}</span>
            </div>

            <div class="flex items-center justify-between text-sm mb-2">
                <strong class="text-zinc-600 font-semibold">Alder:</strong>
                <span>{{ $user->getAge() ?? 'Ikke angivet.' }}</span>
            </div>

            <hr class="my-4">

            <div class="flex items-center justify-between text-sm mb-2">
                <strong class="text-zinc-600 font-semibold">Onlinetid:</strong>
                <span>{{ $user->getOnlineTime() }}</span>
            </div>

            <div class="flex items-center justify-between text-sm mb-2">
                <strong class="text-zinc-600 font-semibold">Mønter:</strong>
                <span>{{ number_format($user->coins, 0, ",", ".") }}</span>
            </div>

            <div class="flex items-center justify-between text-sm mb-2">
                <strong class="text-zinc-600 font-semibold">Figurer i garderoben:</strong>
                <span>{{ number_format($user->avatars->count(), 0, ",", ".") }}</span>
            </div>

            <hr class="my-4">

            <div class="flex items-center justify-between text-sm mb-2">
                <strong class="text-zinc-600 font-semibold">Kommentarer skrevet:</strong>
                <span>{{ number_format($user->comments->count(), 0, ",", ".") }}</span>
            </div>

            <hr class="my-4">

            <div class="flex items-center justify-between text-sm mb-2">
                <strong class="text-zinc-600 font-semibold">Oprettet den:</strong>
                <span>{{ $user->created_at->format('d-m-Y H:i:s') }}</span>
            </div>

            <div class="flex items-center justify-between text-sm mb-2">
                <strong class="text-zinc-600 font-semibold">Sidst logget ind:</strong>
                <span>{{ $user->last_login_at ? $user->last_login_at->format('d-m-Y H:i:s') : 'Ikke angivet.'}}</span>
            </div>

            <hr class="my-4">

            <strong class="text-zinc-600 font-semibold">{{ $user->username }} vil gerne fortælle:</strong>
            <p class="mt-1 text-sm">
                {!! nl2br($user->content) ?? 'Brugeren har ikke skrevet en profil tekst.' !!}
            </p>
        </div>
    </div>
</x-app-layout>