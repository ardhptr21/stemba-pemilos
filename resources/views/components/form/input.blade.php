<div>
    <label for="{{ $name }}"
        class="block text-xs font-semibold uppercase text-primary-light">{{ $label }}</label>
    <input id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" {{ $attributes }}
        class="block w-full px-1 py-3 mt-2 border-b-2 border-gray-100 appearance-none text-primary-light focus:text-primary-extralight focus:outline-none focus:border-primary-extralight" />
</div>
