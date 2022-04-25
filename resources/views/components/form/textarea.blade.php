<div>
    <label for="{{ $name }}"
        class="block text-xs font-semibold uppercase text-primary-light">{{ $label }}</label>
    <textarea id="{{ $name }}" name="{{ $name }}" {{ $attributes }}
        class="block w-full py-3 mt-2 border-2 border-gray-100 rounded-md appearance-none text-primary-light focus:text-primary-extralight focus:outline-none focus:border-primary-extralight">
    </textarea>
    @if ($error)
        <small class="text-red-500">{{ $error }}</small>
    @endif
</div>
