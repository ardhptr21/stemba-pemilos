<div>
    <label for="{{ $name }}"
        class="block text-xs font-semibold uppercase text-primary-light">{{ $label }}</label>
    @if ($info)
        <small class="text-gray-500">{{ $info }}</small>
    @endif
    <textarea id="{{ $name }}" name="{{ $name }}" {{ $attributes }}
        class="block w-full px-5 py-3 mt-2 border-2 border-gray-100 rounded-md text-primary-light focus:text-primary-extralight focus:outline-none focus:border-primary-extralight">{{ $value }}</textarea>
    @if ($error)
        <small class="text-red-500">{{ $error }}</small>
    @endif
</div>
