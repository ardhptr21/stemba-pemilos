<div class="space-y-2">
    <h5 class="font-bold">{{ $label }}:</h5>
    <select
        class="block px-4 py-2 m-0 mb-3 text-xl font-normal text-gray-700 transition ease-in-out bg-white border border-gray-300 border-solid rounded appearance-none focus:text-gray-700 focus:bg-white focus:border-primary-bold focus:outline-none min-w-[10rem] cursor-pointer"
        {{ $attributes }}>
        {{ $slot }}
    </select>

</div>
