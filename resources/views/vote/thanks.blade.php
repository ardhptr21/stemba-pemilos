@extends('layouts.base', ['title' => 'Terima Kasih'])

@section('content')
    <x-base.section x-data="{ time: 10 }" x-init="setinterval = setInterval(() => { if (time > 0) time--; if (time <= 0) window.location.href = '/' }, 1000)"
        class="flex flex-col items-center justify-center min-h-screen text-center bg-texture">
        <div>
            <img class="m-auto mb-5 w-44" src="/assets/gif/thanks{{ rand(1, 5) }}.gif" />
        </div>
        <div class="space-y-3 ">
            <h1 class="text-5xl font-bold text-primary-bold">Terima kasih Telah memilih</h1>
            <p class="text-lg font-semibold text-primary-light">
                Pilihan anda akan menentukan masa depan SMK Negeri 7 Semarang
            </p>
        </div>
        <small class="inline-block mt-5 text-primary-extralight" x-text="`Halaman berpindah dalam ${time} detik`"></small>
    </x-base.section>
@endsection
