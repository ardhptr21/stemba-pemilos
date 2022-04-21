@extends('layouts.base')

@section('content')
    <x-base.section x-data="{ time: 10 }"
        class="flex bg-texture justify-center items-center text-center flex-col min-h-screen">
        <div>
            <img class="m-auto mb-5 w-44" src="/assets/gif/thanks{{ rand(1, 5) }}.gif" />
        </div>
        <div class=" space-y-3">
            <h1 class="text-5xl font-bold text-primary-bold">Terima kasih Telah memilih</h1>
            <p class="text-lg font-semibold text-primary-light">
                Pilihan anda akan menentukan masa depan SMK Negeri 7 Semarang
            </p>
        </div>
        <small class="mt-5 inline-block text-primary-extralight" x-text="`Halaman berpindah dalam ${time} detik`"></small>
    </x-base.section>
@endsection
