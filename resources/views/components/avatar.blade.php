<a href="{{ route('pages.community.profile.show', $user) }}">
    <div class="flex items-center">
        <img src="{{ asset('storage/images/community/avatars/' . $user->gender . '/' . $user->getAvatar()->image) }}" alt="User avatar" class="flex-shrink-0 object-none object-center @if ($type == 'round') bg-zinc-800 border border-zinc-900 border-opacity-20 w-12 h-12 rounded-full @endif">

        <div class="flex-grow flex flex-col pl-4">
            <p class="title-font capitalize font-semibold">{{ $user->username }}</p>
            <p class="text-xs mt-0.5 capitalize">{{ $user->getRole() }}</p>

            @if (!$hideStatusIndicator)
                <x-online-indicator :user="$user" class="text-xs mt-1 font-thin" />
            @endif
        </div>
    </div>
</a>