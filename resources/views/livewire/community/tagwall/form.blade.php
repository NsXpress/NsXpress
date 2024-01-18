<div class="card">
    <form wire:submit="save">
        @csrf

        <x-textarea name="message" label="Besked" wire:model="message"></x-textarea>

        <x-button type="submit" wire:loading.remove>Skriv besked</x-button>

        <span>{{ $message }}</span>
    </form>

    <x-button class="cursor-wait" disabled wire:loading>Skriver..</x-button>
</div>
