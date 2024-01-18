<x-app-layout>
    <div class="card text-sm mt-4">
        <h1 class="text-xl font-heading font-semibold tracking-tight text-zinc-800">Rediger profil</h1>

        <hr class="mt-4 mb-6">

        <div class="flex flex-col-reverse md:flex-row">
            <div class="w-full md:w-3/5">
                <form action="{{ route('pages.community.profile.update') }}" method="POST">
                    @csrf

                    <x-input type="email" name="email" value="{{ $user->email }}" label="E-mail" />
                    <x-input type="text" name="name" value="{{ $user->name }}" label="Navn" />
                    <x-input type="text" name="ns_username" value="{{ $user->ns_username }}" label="Brugernavn på Netstationen" />
                    <x-input type="text" name="birthday" value="{{ $user->birthday }}" id="datepicker" label="Fødselsdag" />
                    
                    <x-textarea name="content" label="Fortæl lidt om dig selv">{{ $user->content }}</x-textarea>
                    
                    <x-button type="submit">Gem indstillinger</x-button>
                </form>
            </div>

            <div class="w-full md:w-2/5">
                <div class="card mb-8 md:mb-0 md:ml-4">
                    <a href="{{ route('pages.community.profile.avatar.edit') }}">
                        <x-button class="w-full mb-2">Min garderobe</x-button>
                    </a>

                    <a href="{{ route('pages.community.profile.password.edit') }}">
                        <x-button class="w-full">Skift adgangskode</x-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>