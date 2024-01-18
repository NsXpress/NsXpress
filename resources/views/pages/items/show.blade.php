<x-app-layout>
    <div class="my-4">
        <h1 class="font-heading text-xl font-semibold tracking-tight text-zinc-800">{{ $item->name }}</h1>

        <span class="text-xs text-zinc-400">Sidst opdateret {{ $item->updated_at }} ({{ $item->updated_at->toFormattedDateString() }})</span>
    </div>

    @if (!empty($values))
        <canvas id="item-chart" class="mt-4"></canvas>
    @endif

    <div class="mt-6 overflow-x-auto">
        <table class="table-auto text-sm w-full p-4 mb-1 text-center">
            <thead class="border border-zinc-900 text-zinc-400 text-xs">
                <tr class="bg-zinc-800 border-b border-zinc-400 ">
                    <th class="whitespace-nowrap py-4 pl-4">Værdi</th>
                    <th class="whitespace-nowrap py-4 pl-4">Antal</th>
                    <th class="whitespace-nowrap pl-4">Dato</th>
                </tr>
            </thead>
            <tbody class="border border-zinc-400 text-zinc-600">
                @forelse ($item->history as $entry)
                    <tr class="@if ($loop->even) bg-zinc-100 @endif">
                        <td class="p-4">
                            {{ number_format($entry->value, 0, ',', '.') }} Monetter
                        </td>
                        <td class="p-4">
                            {{ $entry->quantity ?? 'Ukendt' }}
                        </td>
                        <td class="p-4">
                            {{ $entry->created_at->toFormattedDateString() }}
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
    </div>

    @if (!empty($values))
        @push('scripts')
            <script type="text/javascript">
                const ctx = document.getElementById('item-chart');

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: @json($dates),
                        datasets: [{
                            label: 'Monetter',
                            data: @json($values),
                            borderWidth: 1,
                            backgroundColor: ['rgba(82, 121, 147, 0.3)'],
                            borderColor: ['rgba(82, 121, 147, 1)'],
                            pointBorderColor: ['rgba(82, 121, 147, 1)'],
                            fill: true,
                            tension: 0.1
                        }]
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false,
                            },
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        @endpush
    @endif
</x-app-layout>