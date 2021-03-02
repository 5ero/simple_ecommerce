@php
    $classes = ($active ?? false)
            ? 'inline-flex items-center bg-gray-800 border border-black rounded-t font-semibold leading-5 text-gray-100 focus:outline-none focus:border-yellow-500 transition duration-150 ease-in-out px-4 py-2 mx-1'
            : 'inline-flex items-center bg-gray-50 border border-gray-50 rounded-t font-semibold leading-5 px-4 py-2 mx-1 text-gray-900 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';

@endphp


<a class="{{ $classes }}" href="{{ route(Str::slug($slot)) }}">{{ $slot }}</a>