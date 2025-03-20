@props(['active' => false])

<a {{ $attributes->merge([
    'class' => ($active ? 'text-white bg-blue-600' : 'text-gray-700 hover:bg-blue-600 hover:text-white') . 
              ' rounded-md px-3 py-2 text-sm font-medium'
]) }}
    aria-current="{{ $active ? 'page' : 'false' }}"
>
    {{ $slot }}
</a>
