<x-app-layout>
    <div class="max-w-lg mx-auto pt-16 pb-16 px-6 md:px-10 lg:px-16">
        <div class="text-center">
            <h2 class="text-xl font-semibold tracking-tight text-zinc-900 leading-tight md:leading-relaxed">Log ind på din bruger</h2>
            <p class="mb-10">Velkommen tilbage hos {{ config('app.name') }}</p>
        </div>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <x-input type="email" name="email" label="E-mail"/>
            <x-input type="password" name="password" label="Adgangskode"/>

            <x-input-checkbox name="remember" label="Husk mig" class="-mt-2 mb-6"/>

            <x-button type="submit" class="w-full block">Log ind</x-button>
        </form>

        <div class="flex justify-between">
            <a href="{{ route('password.request') }}" class="link mt-2 text-xs text-center block">Glemt adgangskode</a>
            <a href="{{ route('register') }}" class="link mt-2 text-xs text-center block">Har du ikke en bruger? Opret en her!</a>
        </div>
    </div>
</x-app-layout>