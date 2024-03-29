@extends('layouts.base', ['title' => 'Vote'])

@section('content')
    <x-base.section class="bg-texture space-y-10 relative">
        <div class="w-full flex justify-between items-center mb-10">
            <img class="w-10 md:w-32" src="/assets/images/smkn7smg.png" alt="logo smk n 7 semarang">
            <h1 class="text-xl md:text-5xl text-center font-bold uppercase">Pemilos SMK N 7 Semarang</h1>
            <img class="w-10 md:w-32" src="/assets/images/osis.png" alt="logo osis">
        </div>
        <div class="text-center space-y-3">
            <h1 class="text-4xl font-bold text-primary-bold">Pemilihan Kandidat</h1>
            <p class="font-semibold text-primary-light text-lg max-w-xl mx-auto">Gunakan hak pilih anda dengan tepat,
                <span class="font-bold">JANGAN GOLPUT!</span>
            </p>
        </div>


        <div class="grid md:grid-cols-3 gap-10">
            @foreach ($candidates as $candidate)
                <x-card.card-candidate title="Kandidat {{ $loop->iteration }}" description="{{ $candidate->vision }}"
                    image="{{ $candidate->image }}" action="{{ route('vote.submit', $candidate) }}"
                    link="{{ route('candidates.show', $candidate) }}" />
            @endforeach
        </div>
    </x-base.section>
@endsection
