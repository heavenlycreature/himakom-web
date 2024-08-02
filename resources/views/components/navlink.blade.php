@props(['active'])

@php
$classes = ($active ?? false)
            ? '-mx-3 block text-center lg:text-sm font-semibold lg:leading-6 px-3 py-2 bg-gray-100 rounded-md text-slate-900'
            : '-mx-3 block text-center lg:text-sm font-semibold lg:leading-6 px-3 py-2 rounded-md text-gray-900';
@endphp

<a {{ $attributes->merge(['class' => $classes])  }}>{{ $slot }}</a>