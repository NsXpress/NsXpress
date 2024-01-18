<x-app-layout>
    <div class="mt-4">
        <h1 class="mb-2 font-heading text-xl font-semibold tracking-tight text-zinc-800">Centeret</h1>

        <div class="text-sm text-zinc-600">
            <p class="mb-2">
                Velkommen til centeret!
            </p>

            <p class="mb-2">
                Her kan du købe stilfulde, nye figurer og andre attraktive tilføjelser til din profil, overføre mønter til andre brugere, placere væddemål i kasinoet og meget, meget mere!
            </p>
        </div>

        <div class="mt-4 space-y-4">
            <div class="card flex flex-col md:flex-row">
                <div class="w-full md:w-1/3">
                    <img class="border border-zinc-400 bg-white bg-opacity-10 p-2" src="{{ asset('images/community/bank/bank.jpg') }}" alt="Banken">
                </div>
                
                <div class="w-full md:w-2/3 md:ml-4 relative">
                    <h2 class="mb-2 font-heading text-lg font-semibold tracking-tight text-zinc-800 mt-4 md:mt-0">Banken</h2>
                    <p class="text-sm text-zinc-600">
                        I banken kan du overføre dine mønter til andre brugere.
                    </p>
                    
                    <a href="{{ route('pages.community.bank') }}">
                        <x-button class="mt-4 md:absolute md:bottom-0">Besøg banken</x-button>
                    </a>
                </div>
            </div>

            <div class="card flex flex-col md:flex-row">
                <div class="w-full md:w-1/3">
                    <img class="border border-zinc-400 bg-white bg-opacity-10 p-2" src="{{ asset('images/community/shops/avatar-shop.jpg') }}" alt="Figurbiksen">
                </div>
                
                <div class="w-full md:w-2/3 md:ml-4 relative">
                    <h2 class="mb-2 font-heading text-lg font-semibold tracking-tight text-zinc-800 mt-4 md:mt-0">Figurbiksen</h2>
                    <p class="text-sm text-zinc-600">
                        Har din profil brug for en opfriskning med et nyt og mere spændende udtryk? Besøg Figurbiksen og udforsk et bredt udvalg af fantastiske muligheder, der strækker sig fra det jordnære til det himmelske.
                    </p>
                    
                    <a href="{{ route('pages.community.shops.avatars') }}">
                        <x-button class="mt-4 md:absolute md:bottom-0">Besøg butik</x-button>
                    </a>
                </div>
            </div>

            <div class="card flex flex-col md:flex-row">
                <div class="w-full md:w-1/3">
                    <img class="border border-zinc-400 bg-white bg-opacity-10 p-2" src="{{ asset('images/community/casino/horsetracks.jpg') }}" alt="Væddeløbsbanen">
                </div>
                
                <div class="w-full md:w-2/3 md:ml-4 relative">
                    <h2 class="mb-2 font-heading text-lg font-semibold tracking-tight text-zinc-800 mt-4 md:mt-0">Væddeløbsbanen</h2>
                    <p class="text-sm text-zinc-600">
                        Her har du chancen for at placere dine hårdt tjente mønter på forskellige heste og øge dine mønter ved at vinde.
                    </p>
                    
                    <a href="{{ route('pages.community.casino.hosetrack') }}">
                        <x-button class="mt-4 md:absolute md:bottom-0">Besøg væddeløbsbanen</x-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>