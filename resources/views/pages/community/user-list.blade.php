<x-app-layout>
    <div class="mt-4">
        <h1 class="mb-2 font-heading text-xl font-semibold tracking-tight text-zinc-800">Brugerlisten</h1>

        <div class="text-sm text-zinc-600">
            <p>En samlet oversigt over alle brugerne på {{ config('app.name', 'avisen') }}.</p>
        </div>
    </div>

    <div class="mt-8">
        <form method="POST" action="{{ route('pages.community.userlist.search') }}">
            @csrf
            <x-input-search type="text" name="search_term" label="Hvem leder du efter?" />
        </form>
    </div>

    <div class="mt-6 mb-4 overflow-x-auto">
        <table class="table-auto text-sm w-full p-4 mb-1">
            <thead class="border border-zinc-900 text-zinc-400 text-xs">
                <tr class="bg-zinc-800 text-center border-b border-zinc-400 ">
                    <th class="whitespace-nowrap py-4">Brugernavn</th>
                    <th class="whitespace-nowrap">Rolle</th>
                    <th class="whitespace-nowrap">Oprettelsesdato</th>
                    <th class="whitespace-nowrap">Sidst logget ind</th>
                </tr>
            </thead>
            <tbody class="border border-zinc-400 text-zinc-600">
                @forelse ($users as $user)
                    <tr class="text-center cursor-pointer @if ($loop->even) bg-zinc-100 @endif hover:bg-zinc-200" onclick="javascript:self.location.href='{{ route('pages.community.profile.show', ['user' => $user]) }}'">
                        <td class="p-4">
                            {{ $user->username }}
                        </td>
                        <td class="p-4 capitalize">
                            {{ $user->getRole() }}
                        </td>
                        <td class="p-4">
                            {{ $user->created_at }}
                        </td>
                        <td class="p-4">
                            {{ $user->last_login_at }}
                        </td>
                    </tr>
                @empty
                    <tr class="text-left">
                        <td class="p-4">
                            Ingen brugere fundet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $users->links() }}
</x-app-layout>
