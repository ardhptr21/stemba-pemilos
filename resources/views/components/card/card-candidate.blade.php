<div class="w-full flex justify-between items-center flex-col group gap-5" x-data="{ isOpen: false }">
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
        <x-button.button-primary @click="isOpen = true" class="w-full">Pilih</x-button.button-primary>
    </div>

    <div x-show="isOpen" x-transition x-transition.opacity
        class="bg-primary-bold bg-opacity-50 flex justify-center items-start fixed top-0 right-0 bottom-0 left-0">
        <div class="bg-white px-16 py-14 rounded-md text-center mt-10" @click.outside="isOpen = false">
            <h1 class="text-xl mb-4 font-semibold text-slate-500">Yakin ingin memilih <span
                    class="font-bold">{{ $title }}</span>?</h1>
            <x-button.button-outline @click="isOpen = false">Batal
            </x-button.button-outline>
            <form action="{{ $action }}" method="POST" class="inline-block">
                @csrf
                <x-button.button-primary type="submit">Konfirmasi</x-button.button-primary>
            </form>
        </div>
    </div>
</div>
