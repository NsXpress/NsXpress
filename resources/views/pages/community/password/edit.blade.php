<x-app-layout>
    <div class="card text-sm mt-4">
        <h1 class="text-xl font-heading font-semibold tracking-tight text-zinc-800">Skift din adgangskode</h1>

        <hr class="mt-4 mb-6">

        <form action="{{ route('pages.community.profile.password.update') }}" method="POST">
            @csrf

            <x-input type="password" name="current_password" label="Nuværende adgangskode" />
            <x-input type="password" name="password" label="Nye adgangskode" />
            <x-input type="password" name="password_confirmation" label="Bekræft adgangskode" />
            
            <x-button type="submit">Gem adgangskode</x-button>
        </form>
    </div>
</x-app-layout>