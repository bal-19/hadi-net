@props(['active' => false])

<a {{ $attributes }}
    class="{{ $active ? 'text-white bg-indigo-700 md:bg-transparent md:text-indigo-700 md:p-0 md:dark:text-indigo-500' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-indigo-700 md:p-0 dark:text-white md:dark:hover:text-indigo-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700' }} block py-2 px-3 rounded transition-all duration-500"
    aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>
