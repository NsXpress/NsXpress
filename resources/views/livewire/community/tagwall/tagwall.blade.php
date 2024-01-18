<div>
    @if (!$posts->isEmpty())
        @foreach ($posts as $post)
            <x-tagwall-post :post="$post" class="mb-4" />
        @endforeach
    @else
        <p class="mb-6 text-center">Der er ingen beskeder i tagwallen endnu! Vær den første til at skrive en besked.</p>
    @endif

    {{ $posts->links() }}
</div>
