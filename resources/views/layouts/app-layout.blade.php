<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="robots" content="index">
        <meta property="og:locale" content="da_DK">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ request()->url() }}">
        <meta name="description" content="{{ env('app.name') }} er brugernes kilde til nyheder fra Netstationen. Meget mere end Netstationens førende avis.">

        <link rel="canonical" href="{{ request()->url() }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ url('images/favicon/apple-touch-icon.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ url('images/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ url('images/favicon/favicon-16x16.png') }}">

        <title>{{ config('app.name', 'NsXpress') }} » Alt om Netstationen</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">

        <!-- Styles -->
        @livewireStyles
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/manucaralmo/GlowCookies@3.1.8/src/glowCookies.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-D6R9HC7LSZ"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-D6R9HC7LSZ');
        </script>
    </head>
    <body class="antialiased font-body" id="snow" x-data="{ mobileMenu: false }">
        @if (!empty($currentContest))
            <div class="w-full bg-green-500 p-2 text-green-100 text-sm">
                <div class="container mx-auto max-w-3xl">
                    <a href="{{ route('pages.contests.show', $currentContest) }}">
                        <strong>Konkurrence:</strong> {{ $currentContest->name; }}
                    </a>
                </div>
            </div>
        @endif

        <div class="h-40">
            <div class="container mx-auto max-w-3xl px-4">
                <header class="py-8 flex justify-between items-center">
                    <a href="{{ route('pages.articles') }}" class="block mx-auto">
                        <h1 class="text-4xl font-title text-white logo-shadow font-bold" id="logo">
                            {{ config('app.name', 'NsXpress') }}
                        </h1>
                    </a>

                    <div class="md:hidden">
                        <button class="navbar-burger text-yellow-600 hover:text-yellow-400 focus:outline-none" @click="mobileMenu = !mobileMenu">
                            <svg width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <title>Mobile menu</title>
                                <path d="M1 2H19C19.2652 2 19.5196 1.89464 19.7071 1.70711C19.8946 1.51957 20 1.26522 20 1C20 0.734784 19.8946 0.48043 19.7071 0.292893C19.5196 0.105357 19.2652 0 19 0H1C0.734784 0 0.48043 0.105357 0.292893 0.292893C0.105357 0.48043 0 0.734784 0 1C0 1.26522 0.105357 1.51957 0.292893 1.70711C0.48043 1.89464 0.734784 2 1 2ZM19 10H1C0.734784 10 0.48043 10.1054 0.292893 10.2929C0.105357 10.4804 0 10.7348 0 11C0 11.2652 0.105357 11.5196 0.292893 11.7071C0.48043 11.8946 0.734784 12 1 12H19C19.2652 12 19.5196 11.8946 19.7071 11.7071C19.8946 11.5196 20 11.2652 20 11C20 10.7348 19.8946 10.4804 19.7071 10.2929C19.5196 10.1054 19.2652 10 19 10ZM19 5H1C0.734784 5 0.48043 5.10536 0.292893 5.29289C0.105357 5.48043 0 5.73478 0 6C0 6.26522 0.105357 6.51957 0.292893 6.70711C0.48043 6.89464 0.734784 7 1 7H19C19.2652 7 19.5196 6.89464 19.7071 6.70711C19.8946 6.51957 20 6.26522 20 6C20 5.73478 19.8946 5.48043 19.7071 5.29289C19.5196 5.10536 19.2652 5 19 5Z" fill="currentColor"></path>
                            </svg>
                        </button>
                    </div>

                    @include('includes.marquee')
                </header>
    
                <main class="p-2 border border-gray-300 bg-white bg-opacity-10 relative">
                    <div class="p-4 bg-white">
                        @include('includes.navigation')

                        {{ $slot }}
                    </div>
                </main>

                <footer class="py-4 text-xs shadow-[0 1px 0 rgba(0,0,0,.25)] text-zinc-800 flex justify-between">
                    <div class="flex flex-col">
                        <p>© @php echo date('Y'); @endphp {{ config('app.name', 'Laravel') }}. Alle rettigheder forbeholdes.</p>

                        <!-- OBS; Denne linje må IKKE fjernes! -->
                        <a href="https://github.com/NsXpress/NsXpress" class="shadow-[0 1px 0 rgba(0,0,0,.25)] text-zinc-800 block mt-1">Baseret på NsXpress OS</a>
                    </div>

                    <div class="text-right">
                        <a href="https://netstationen.dk" target="_blank" class="shadow-[0 1px 0 rgba(0,0,0,.25)] text-zinc-800 block text-xs">Besøg Netstationen</a>
                        <a href="{{ route('pages.terms') }}" class="shadow-[0 1px 0 rgba(0,0,0,.25)] text-zinc-800 block mt-1">Vores brugerbetingelser</a>
                    </div>
                </footer>
            </div>
        </div>

        @include('includes.notifications')
        @stack('scripts')
    </body>
</html>
