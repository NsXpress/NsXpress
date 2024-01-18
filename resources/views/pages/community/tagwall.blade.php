<x-app-layout>
    <div class="my-4">
        <div class="flex justify-between">
            <div class="w-full md:w-3/4">
                <div class="mr-4">
                    <livewire:community.tagwall.form />
                </div>
            </div>

            <div class="hidden md:block md:w-1/4">
                <div class="card text-xs">
                    <div class="-m-4 bg-zinc-800 border-b border-zinc-900 p-2 text-zinc-200 text-center">
                        <span class="font-semibold">Online</span>
                    </div>

                    @if (!$users->isEmpty())
                        <ul class="mt-7">
                            @foreach ($users as $user)
                                <li>
                                    <a href="{{ route('pages.community.profile.show', $user) }}">{{ $user->username }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <hr>

    <div class="my-4">
        <livewire:community.tagwall.tagwall wire:poll.60s />
    </div>
</x-app-layout>
