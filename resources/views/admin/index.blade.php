@extends('layouts.admin', ['title' => 'Admin Dashboard'])


@section('content')
    <section class="space-y-10">

        <div class="flex items-center justify-between space-x-4">
            <x-card.card-overview title="Persentasi Pemilih" value="{{ $percent_of_all }}%">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                </svg>
            </x-card.card-overview>
            @foreach ($each_candidate_percent as $candidate_percent)
                <x-card.card-overview title="Kandidat {{ $loop->iteration }}" value="{{ $candidate_percent }}%">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </x-card.card-overview>
            @endforeach
        </div>


        <div class="overflow-hidden rounded-lg shadow-lg" x-init="generateBarGrafic({{ json_encode($each_candidate_percent) }})">
            <div class="px-5 py-3 bg-gray-50">Presentasi Voting Kandidat</div>
            <canvas class="p-10 bg-white" id="chartBar"></canvas>
        </div>
    </section>
@endsection
