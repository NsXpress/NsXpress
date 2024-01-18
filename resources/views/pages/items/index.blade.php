<x-app-layout>
    <div class="mt-4">
        <h1 class="mb-2 font-heading text-xl font-semibold tracking-tight text-zinc-800">Prisguide</h1>

        <div class="text-sm text-zinc-600">
            <p class="mb-2">En samlet oversigt over priserne på ting og baggrunde på Netstationen.</p>
            <p class="mb-2">Priser og antal vurderes af eksperter fra vores avis, herunder prisanalytikere og redaktører. Hvis du har nogen uenighed med hensyn til priserne eller antallet, er du velkommen til at kontakte {{ config('app.name', 'Laravel') }}.</p>
            <p>Bemærk, at priserne og mængden af ting kun er skøn og kan være unøjagtige eller upræcise.</p>
        </div>
    </div>

    <div class="mt-6 flex flex-col md:flex-row">
        @foreach ($categories as $category)
            <a href="{{ route('pages.items', $category) }}">
                <div class="mb-2 md:mb-0 px-4 py-2 border border-zinc-900 text-xs mr-2 cursor-pointer transition-colors hover:bg-zinc-900 hover:text-zinc-100 @if(request()->route('category') && request()->route('category')->slug === $category->slug) bg-zinc-900 text-zinc-100 @endif">
                    {{ $category->name }}
                </div>
            </a>
        @endforeach
    </div>

    <div class="mt-8">
        <form method="POST" action="{{ route('pages.items.search') }}">
            @csrf
            <x-input-search type="text" name="search_term" label="Hvad leder du efter?" />
        </form>
    </div>

    <div class="mt-6 mb-4 overflow-x-auto">
        <table class="table-auto text-sm w-full p-4 mb-1">
            <thead class="border border-zinc-900 text-zinc-400 text-xs">
                <tr class="bg-zinc-800 text-center border-b border-zinc-400 ">
                    <th class="whitespace-nowrap hidden lg:table-cell">Billede</th>
                    <th class="whitespace-nowrap py-4">Navn</th>
                    <th class="whitespace-nowrap">Antal</th>
                    <th class="whitespace-nowrap">Værdi</th>
                    <th class="whitespace-nowrap">Historik</th>
                </tr>
            </thead>
            <tbody class="border border-zinc-400 text-zinc-600">
                @forelse ($items as $item)
                    <tr class="text-center @if ($loop->even) bg-zinc-100 @endif">
                        <td class="p-4 hidden lg:block">
                            <img alt="item" src="{{ asset('storage/' . $item->getImage()) }}" class="mx-auto w-14 h-14 object-contain" loading="lazy">
                        </td>
                        <td class="p-4">
                            {{ $item->name }}
                        </td>
                        <td class="p-4">
                            @isset($item->quantity)
                                {{ number_format($item->quantity, 0, ',', '.') }}
                            @else
                                Ukendt
                            @endisset
                        </td>
                        <td class="p-4">
                            @isset($item->value)
                                {{ number_format($item->value, 0, ',', '.') }} Monetter
                            @else
                                Ukendt
                            @endisset
                        </td>
                        <td class="p-4">
                            <a href="{{ route('pages.items.show', ['item' => $item]) }}">
                                <img src="data:image/png;base64,{{ $item->sparkline }}" alt="Sparkline for {{ $item->name }}" class="mx-auto">
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr class="text-left">
                        <td class="p-4">
                            Ingen resultater fundet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <p class="text-xs text-zinc-600">*Antal og priser er et cirka estimat.</p>
    </div>

    {{ $items->links() }}
</x-app-layout>
