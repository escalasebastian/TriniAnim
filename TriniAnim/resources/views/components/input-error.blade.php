@props(['messages'])

@if ($messages)
    {{-- Cambio la clase para que muestre los errores con mi estilo --}}
    <ul {{ $attributes->merge(['class' => 'error']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
