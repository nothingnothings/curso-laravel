@props(['active' => false])
<!-- This is how we declare props, in laravel. This 'active' prop's default value will be 'false', in this case.  -->

<a {{ $attributes }} aria-current="{{ $active ? 'page' : 'false'}}"
    class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">{{ $slot }}</a>
