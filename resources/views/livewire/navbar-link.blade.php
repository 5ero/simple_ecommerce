

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center border-b-2 border-blue-400  rounded-t  font-semibold leading-5 text-gray-500 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out px-4 py-2'
            : 'inline-flex items-center border-b-2 border-transparent px-1 pt-1 font-semibold leading-5 text-gray-400 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp


<a class="{{ $classes }}" href="{{ route(Str::slug($slot)) }}">{{ $slot }}</a>