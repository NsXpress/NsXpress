<x-app-layout>
    <div class="mt-4">
        <h1 class="mb-2 font-heading text-xl font-semibold tracking-tight text-zinc-800">Væddeløbsbanen</h1>

        <div class="text-sm text-zinc-600">
            <p class="mb-2">
                Velkommen til væddeløbsbanen!
            </p>

            <p>
                Her har du mulighed for at investere dine hårdt tjente mønter i forskellige heste, hvor hver hest har sin egen vinderchance og den tilsvarende størrelse af din potentielle udbetaling.
            </p>
        </div>
    </div>

    <div class="mt-4 flex flex-col justify-between md:flex-row">
        <div class="w-full md:w-1/4">
            <x-avatar-coins :user="$user"/>
        </div>
    
        <div class="mt-4 w-full md:mt-0 md:w-3/4 md:pl-6">
            <div x-data="{ pickedHorse: '' }">
                @foreach ($horses as $horse)
                    <div x-on:click="pickedHorse = {{ $horse['id'] }}"
                        x-bind:class="{ 'bg-blue-100': pickedHorse === {{ $horse['id'] }} }" 
                        class="border border-zinc-400 p-4 mb-4 cursor-pointer" 
                        id="{{ $horse['id'] }}">
                        
                        <strong>{{ $horse['name'] }}</strong>

                        <hr class="my-2">

                        <div class="flex justify-between text-sm">
                            <span>Chance for at vinde: {{ $horse['win_percentage'] }}%</span>
                            <span>Gevinst retur: {{ $horse['multiplier'] }}x mønter</span>
                        </div>
                    </div>
                @endforeach

                <hr class="my-8">

                <form action="{{ route('pages.community.casino.hosetrack.bet') }}" method="POST">
                    @csrf

                    <input x-model="pickedHorse" type="hidden" name="picked_horse" required>

                    <x-input type="number" name="bet" label="Indsats" min="1"/>
                    <x-button class="-mt-8">Placer indsats</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>