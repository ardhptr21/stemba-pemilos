@extends('layouts.base')

@section('content')
    <x-base.section class="bg-texture space-y-10 relative">
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
