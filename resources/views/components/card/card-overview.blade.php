<div class="flex items-center justify-around w-64 p-6 mt-10 space-x-2 bg-white shadow-lg cursor-pointer rounded-xl">
    <div>
        <span class="text-sm font-semibold text-primary-light">{{ $title }}</span>
        <h1 class="text-2xl font-bold">{{ $value }}</h1>
    </div>
    <div class="text-primary-bold">
        {{ $slot }}
    </div>
</div>
