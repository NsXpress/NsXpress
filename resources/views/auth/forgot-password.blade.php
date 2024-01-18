<x-app-layout>
    <div class="max-w-lg mx-auto pt-16 pb-16 px-6 md:px-10 lg:px-16">
        <div class="text-center">
            <h2 class="mb-6 text-xl font-semibold tracking-tight text-zinc-900 leading-tight md:leading-relaxed">Glemt adgangskode</h2>
        </div>

        <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <x-input type="email" name="email" label="E-mail"/>

            <x-button type="submit" class="w-full block">Nulstil min adgangskode</x-button>
        </form>
    </div>
</x-app-layout>