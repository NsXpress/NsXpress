<button {{ $attributes->merge(['class' => "px-4 py-2 text-[rgb(161,88,46)] bg-[rgb(255,204,102)] border shadow-[rgb(255,246,116)_1px_1px_0px_inset] border-solid border-[rgb(217,143,100)] transition duration-200 hover:bg-[rgb(255,214,131)] text-center text-xs"]) }}>
    {{ $slot }}
</button>