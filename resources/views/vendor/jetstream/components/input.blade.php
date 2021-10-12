@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full border border-cdsolec-green-dark focus:border-gray-300 focus:ring focus:ring-gray-300 focus:ring-opacity-50 text-gray-800 rounded-md shadow']) !!} />
