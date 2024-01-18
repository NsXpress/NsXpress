<div {{ $attributes->merge(['class' => "flex items-center mb-4"]) }}>
    <input name="{{ $name }}" id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-none">
    <label for="default-checkbox" class="ml-2 ms-2 text-sm font-medium text-zinc-700">{{ $label }}</label>
</div>