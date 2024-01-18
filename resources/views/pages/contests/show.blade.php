<x-app-layout>
    @if (!$contest->isActive())
        <div class="mt-4 bg-red-500 px-4 py-2 text-xs text-zinc-100">
            Denne konkurrence er afsluttet.
        </div>
    @endif

    <div class="my-4">
        <h1 class="mb-2 font-heading text-xl font-semibold tracking-tight text-zinc-800">{{ $contest->name }}</h1>

        <div class="mb-4 mt-2 flex flex-col text-sm">
            <span class="mb-2 flex items-center">
                <x-heroicon-o-clock class="mr-2 h-3 w-3 text-zinc-600" />
                Starter: {{ $contest->start_date }}
            </span>

            <span class="flex items-center">
                <x-heroicon-o-clock class="mr-2 h-3 w-3 text-zinc-600" />
                Slutter: {{ $contest->end_date }}
            </span>
        </div>

        <div class="markdown-content">
            <x-markdown>
                {{ $contest->content }}
            </x-markdown>
        </div>

        <div class="card text-sm">
            <strong class="font-semibold capitalize tracking-tight">Præmier:</strong>
            <ul class="list-inside list-disc text-zinc-600">
                @foreach ($prizes as $prize)
                    <li>{{ $prize }}</li>
                @endforeach
            </ul>
        </div>
</x-app-layout>
