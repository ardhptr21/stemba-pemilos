<div class="w-full flex justify-between items-center flex-col group gap-5">
    <div class="space-y-5">
        <div class="rounded-md h-96 overflow-hidden">
            <img src="{{ $image }}" alt="{{ str($title)->lower() }}"
                class="transition duration-300 group-hover:scale-105">
        </div>
        <div class="space-y-5">
            <h2 class="text-primary-bold font-bold text-2xl">{{ $title }}</h2>
            <p class="font-semibold text-primary-extralight capitalize">{{ $description }}</p>
        </div>
    </div>

    <div class="flex justify-center items-center gap-3 w-full">
        <a href="{{ $info_link }}" class="block w-full">
            <x-button.button-outline class="w-full">Info</x-button.button-outline>
        </a>
        <form action="{{ $action }}" method="POST" class="w-full">
            @csrf
            <x-button.button-primary type="submit" onclick="return confirm('Yakin dengan pilihan anda?')"
                class="w-full">Pilih</x-button.button-primary>
        </form>
    </div>
</div>
