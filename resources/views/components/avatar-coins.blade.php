<div class="border border-zinc-400 p-4">
    <x-avatar :user="$user" hideStatusIndicator=true />

    <div class="mt-4 flex flex-col text-[11px] text-zinc-600">
        <p class="flex justify-between">
            <strong>Mønter:</strong> {{ number_format($user->coins, 0, ",", ".") }}
        </p>
    </div>
</div>