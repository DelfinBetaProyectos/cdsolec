@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-cdsolec-green-dark text-sm font-medium leading-5 text-cdsolec-green-dark focus:outline-none focus:border-cdsolec-green-light transition'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-cdsolec-green-dark hover:text-white hover:border-cdsolec-green-dark focus:outline-none focus:text-cdsolec-green-dark focus:border-cdsolec-green-light transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
