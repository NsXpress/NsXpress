<x-app-layout>
    <div class="my-4">
        <h1 class="mb-2 font-heading text-xl font-semibold tracking-tight text-zinc-800">Konkurrencer</h1>

        <div class="text-sm text-zinc-600">
            <p class="mb-2">
                Hos {{ config('app.name') }} er vores primære mål at sprede glæde og entusiasme blandt vores læserskare. Af den grund stræber vi efter at arrangere regelmæssige konkurrencer, hvor alle kan deltage og have en chance for at vinde fantastiske præmier.
            </p>

            <p class="mb-2">
                Hvis du ønsker at bidrage som sponsor til en eller flere af vores konkurrencer, er du velkommen til at kontakte <a class="link" href="{{ route('pages.team') }}">avisens redaktør</a> på Netstationen for yderligere information.
            </p>

            <p>Nedenfor kan du se vores nuværende og tidligere konkurrencer.</p>
        </div>
    </div>

    @forelse ($contests as $contest)
        <a href="{{ route('pages.contests.show', $contest) }}">
            <div class="card relative my-6 text-sm text-zinc-600">
                <span class="@if ($contest->isActive()) bg-green-500 @else bg-red-500 @endif absolute left-0 top-0 px-4 py-1 text-xs text-zinc-100">
                    @if ($contest->isActive())
                        Igangværende
                    @else
                        Afsluttet
                    @endif
                </span>

                <h2 class="mb-2 mt-4 font-semibold leading-tight tracking-tight text-zinc-800 md:mb-0 md:leading-relaxed">{{ $contest->name }}</h2>

                <div class="flex flex-col md:flex-row justify-between text-sm">
                    <span class="flex items-center mb-2 md:mb-0">
                        <x-heroicon-o-clock class="mr-2 h-4 w-4" />
                        Starter: {{ $contest->start_date }}
                    </span>

                    <span class="flex items-center">
                        <x-heroicon-o-clock class="mr-2 h-4 w-4" />
                        Slutter: {{ $contest->end_date }}
                    </span>
                </div>
            </div>
        </a>
    @empty
        <p class="text-md font-semibold text-zinc-600">Der er desværre ingen konkurrencer endnu.</p>
    @endforelse
</x-app-layout>
