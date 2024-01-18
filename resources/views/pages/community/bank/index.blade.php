<x-app-layout>
    <div class="mt-4">
        <h1 class="mb-2 font-heading text-xl font-semibold tracking-tight text-zinc-800">Banken</h1>

        <div class="text-sm text-zinc-600">
            <p class="mb-2">
                Velkommen til banken!
            </p>

            <p>
                Her kan du overføre dine mønter til andre brugere.
            </p>
        </div>
    </div>

    <div class="mt-4 flex flex-col justify-between md:flex-row">
        <div class="w-full md:w-1/4">
            <x-avatar-coins :user="$user"/>
        </div>
    
        <div class="mt-4 w-full md:mt-0 md:w-3/4 md:pl-6">
            <div class="border border-zinc-400 p-4">
                <form action="{{ route('pages.community.bank.transfer') }}" method="POST">
                    @csrf
                    
                    <x-input-select name="user" label="Vælg en modtager" required>
                        <option selected disabled>Vælg en modtager</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                        @endforeach
                    </x-input-select>

                    <x-input type="number" name="amount" label="Antal mønter" min="1" required/>

                    <x-button>Overfør mønter</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>