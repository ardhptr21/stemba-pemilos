<div
    class="flex items-center px-4 py-3 text-sm font-medium leading-none text-white transition duration-300 rounded-md cursor-pointer bg-primary-light hover:bg-primary-extralight">
    <h5>{{ $label }}:</h5>
    <select class="ml-1 bg-transparent cursor-pointer focus:outline-none" {{ $attributes }}>
        {{ $slot }}
    </select>
</div>
