<!-- Desktop -->
<nav class="hidden border border-zinc-400 p-1 md:contents">
    <ul class="flex text-xs text-zinc-400">
        <x-nav-link href="{{ route('pages.articles') }}">Artikler</x-nav-link>
        <x-nav-link href="{{ route('pages.items') }}">Prisguide</x-nav-link>
        <x-nav-link href="{{ route('pages.team') }}">Redaktionen</x-nav-link>
        <div class="relative flex-1 text-center" x-data="{ open: false }">
            <x-nav-link @click="open = !open" @click.away="open = false">Andet</x-nav-link>

            <ul class="absolute left-0 z-50 w-full border-t border-zinc-700 bg-zinc-900 shadow" x-show="open" x-transition x-cloak>
                <x-nav-sub-link href="{{ route('pages.contests') }}">Konkurrencer</x-nav-sub-link>
            </ul>
        </div>

        <div class="relative flex-1 text-center" x-data="{ open: false }">
            <x-nav-link @click="open = !open" @click.away="open = false">Community</x-nav-link>
            @guest
                <ul class="absolute left-0 z-50 w-full border-t border-zinc-700 bg-zinc-900 shadow" x-show="open" x-transition x-cloak>
                    <x-nav-sub-link href="{{ route('register') }}">Opret bruger</x-nav-sub-link>
                    <x-nav-sub-link href="{{ route('login') }}">Log ind</x-nav-sub-link>
                </ul>
            @endguest

            @auth
                <ul class="absolute left-0 z-50 w-full border-t border-zinc-700 bg-zinc-900 shadow" x-show="open" x-transition x-cloak>
                    <x-nav-sub-link href="{{ route('pages.community.userlist') }}">Brugerlisten</x-nav-sub-link>
                    <x-nav-sub-link href="{{ route('pages.community.center') }}">Centeret</x-nav-sub-link>
                    <x-nav-sub-link href="{{ route('pages.community.tagwall') }}">Tagwall</x-nav-sub-link>
                </ul>
            @endauth
        </div>

        @auth
            <div class="relative flex-1 text-center" x-data="{ open: false }">
                <x-nav-link @click="open = !open" @click.away="open = false">Min konto</x-nav-link>
                <ul class="absolute left-0 z-50 w-full border-t border-zinc-700 bg-zinc-900 shadow" x-show="open" x-transition x-cloak>
                    @unlessrole('bruger')
                        <x-nav-sub-link href="/qwerty">Administrator</x-nav-sub-link>
                    @endunlessrole

                    <x-nav-sub-link href="{{ route('pages.community.profile.show', auth()->user()) }}">Min profil</x-nav-sub-link>
                    <x-nav-sub-link href="{{ route('pages.community.profile.edit') }}">Rediger profil</x-nav-sub-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-nav-sub-link onclick="event.preventDefault();this.closest('form').submit();">Log ud</x-nav-sub-link>
                    </form>
                </ul>
            </div>
        @endauth
    </ul>
</nav>

<!-- Mobile -->
<nav class="md:hidden fixed top-0 left-0 z-50 w-full max-w-sm bg-zinc-900 border-r border-zinc-700 text-zinc-400 shadow-2xl h-full overflow-x-auto" x-show="mobileMenu" @click.away="mobileMenu = false" x-cloak>
    <ul class="flex flex-col h-full">
        <div class="flex-grow">
            <span class="block font-bold text-sm text-zinc-600 my-6 px-8">Menu</span>
            <x-nav-mobile-link href="{{ route('pages.articles') }}">Artkler</x-nav-mobile-link>
            <x-nav-mobile-link href="{{ route('pages.items') }}">Prisguide</x-nav-mobile-link>
            <x-nav-mobile-link href="{{ route('pages.team') }}">Redaktionen</x-nav-mobile-link>
            <x-nav-mobile-link href="{{ route('pages.contests') }}">Konkurrencer</x-nav-mobile-link>
        </div>
        
        <div>
            @guest
                <span class="block font-bold text-sm text-zinc-600 my-6 px-8">Community</span>
                <x-nav-mobile-link href="{{ route('register') }}">Opret bruger</x-nav-mobile-link>
                <x-nav-mobile-link href="{{ route('login') }}">Log ind</x-nav-mobile-link>
            @endguest

            @auth
                <span class="block font-bold text-sm text-zinc-600 my-6 px-8">Community</span>
                <x-nav-mobile-link href="{{ route('pages.community.userlist') }}">Brugerlisten</x-nav-mobile-link>
                <x-nav-mobile-link href="{{ route('pages.community.center') }}">Centeret</x-nav-mobile-link>
                <x-nav-mobile-link href="{{ route('pages.community.tagwall') }}">Tagwall</x-nav-mobile-link>

                <span class="block font-bold text-sm text-zinc-600 my-6 px-8">Konto</span>
                @unlessrole('bruger')
                    <x-nav-mobile-link href="/qwerty">Administrator</x-nav-mobile-link>
                @endunlessrole
                
                <x-nav-mobile-link href="{{ route('pages.community.profile.show', auth()->user()) }}">Min profil</x-nav-mobile-link>
                <x-nav-mobile-link href="{{ route('pages.community.profile.edit') }}">Rediger profil</x-nav-mobile-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-nav-mobile-link onclick="event.preventDefault();this.closest('form').submit();">Log ud</x-nav-mobile-link>
                </form>
            @endauth
        </div>
    </ul>
</nav>