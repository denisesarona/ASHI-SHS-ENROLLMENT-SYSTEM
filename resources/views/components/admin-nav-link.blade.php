@props(['active' => false])

<a {{ $attributes->merge([
    'class' => 'block w-full rounded-md px-3 py-2 text-md font-large ' . 
              ($active ? 'text-white bg-blue-500' : 'dark:text-white p-2 dark:hover:bg-blue-500 hover:text-white')
]) }}
    aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</a>
