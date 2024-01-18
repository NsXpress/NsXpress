<x-app-layout>
    <div class="max-w-lg mx-auto pt-16 pb-16 px-6 md:px-10 lg:px-16">
        <div class="text-center">
            <h2 class="text-xl font-semibold tracking-tight text-zinc-900 leading-tight md:leading-relaxed">Opret bruger</h2>
            <p class="mb-10">Velkommen til {{ config('app.name') }}</p>
        </div>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <x-input type="text" name="username" label="Brugernavn"/>
            <x-input type="email" name="email" label="E-mail"/>
            <x-input type="password" name="password" label="Adgangskode"/>
            <x-input type="password" name="password_confirmation" label="Gentag adgangskode"/>

            <label class="text-xs font-semibold block -mt-2 mb-2">Køn</label>

            <div class="flex gap-x-6 mb-4">
                <div class="flex">
                    <input type="radio" name="gender" value="male" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500" checked>
                    <label class="text-sm ml-2">Mand</label>
                </div>

                <div class="flex">
                    <input type="radio" name="gender" value="female" class="shrink-0 mt-0.5 border-gray-200 rounded-full text-blue-600 focus:ring-blue-500">
                    <label class="text-sm ml-2">Kvinde</label>
                </div>
            </div>

            <a href="{{ route('pages.terms') }}" class="link mb-6 block text-xs">Husk at læse vores brugerbetingelser inden du opretter dig.</a>

            <x-button type="submit" class="w-full block">Opret bruger</x-button>
        </form>
    </div>
</x-app-layout>