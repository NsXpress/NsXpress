<x-app-layout>
    <div class="max-w-lg mx-auto pt-16 pb-16 px-6 md:px-10 lg:px-16">
        <div class="text-center">
            <h2 class="mb-6 text-xl font-semibold tracking-tight text-zinc-900 leading-tight md:leading-relaxed">Opdater adgangskode</h2>
        </div>

        <form action="{{ route('password.update') }}" method="POST">
            @csrf

            <x-input type="password" name="password" label="Adgangskode"/>
            <x-input type="password" name="password_confirmation" label="Gentag adgangskode"/>

            <input type="hidden" name="email" value="{{ request()->get('email') }}">
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <x-button type="submit" class="w-full block">Opdater adgangskode</x-button>
        </form>
    </div>
</x-app-layout>