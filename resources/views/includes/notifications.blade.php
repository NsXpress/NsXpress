@if ($errors->any())
    <x-toast type="error">
        <ul class="list-inside">
            @foreach ($errors->all() as $error)
                <li class="leading-4 mb-2">{{ $error }}</li>
            @endforeach
        </ul>
    </x-toast>
@endif

@if (session()->has('success'))
    <x-toast type="success">
        {{ session('success') }}
    </x-toast>
@endif

@if (session()->has('error'))
    <x-toast type="error">
        {{ session('error') }}
    </x-toast>
@endif

@if (session()->has('status'))
    <x-toast>
        {{ session('status') }}
    </x-toast>
@endif