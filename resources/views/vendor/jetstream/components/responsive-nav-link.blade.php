@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-cdsolec-green-dark text-base font-medium text-white bg-cdsolec-green-light focus:outline-none focus:text-cdsolec-green-dark focus:bg-cdsolec-green-light focus:border-cdsolec-green-dark transition'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-white hover:text-white hover:bg-cdsolec-green-light hover:border-cdsolec-green-light focus:outline-none focus:text-white focus:bg-cdsolec-green-light focus:border-cdsolec-green-light transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
