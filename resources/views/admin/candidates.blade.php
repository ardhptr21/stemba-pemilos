@extends('layouts.admin', ['title' => 'Admin Kandidat', 'admin_title' => 'Kandidat'])

@section('content')
    <section class="space-y-5">
        @if (session('success'))
            <x-alert.success>{{ session('success') }}</x-alert.success>
        @elseif (session('error'))
            <x-alert.danger>{{ session('error') }}</x-alert.danger>
        @endif
        @if (count($candidates))
            @foreach ($candidates as $candidate)
                <div class="p-10  bg-white border-2 rounded-lg">
                    <h2 class="text-2xl font-bold">Kandidat {{ $loop->iteration }}</h2>
                    <div class="space-y-3 mt-10">
                        <div class="flex gap-3">
                            <h3 class="font-semibold">Ketua</h3>
                            <span>:</span>
                            <p>{{ $candidate->chairman }}</p>
                        </div>
                        <div class="flex gap-3">
                            <h3 class="font-semibold">Wakil Ketua</h3>
                            <span>:</span>
                            <p>{{ $candidate->vice_chairman }}</p>
                        </div>
                        <div class="flex gap-3">
                            <h3 class="font-semibold">Motto</h3>
                            <span>:</span>
                            <p>{{ $candidate->motto }}</p>
                        </div>
                        <div class="flex gap-3">
                            <h3 class="font-semibold">Visi</h3>
                            <span>:</span>
                            <p>{{ $candidate->vision }}</p>
                        </div>
                        <div class="flex gap-3">
                            <h3 class="font-semibold">Misi</h3>
                            <span>:</span>
                            <ul class="list-disc list-inside">
                                {!! $candidate->mission !!}
                            </ul>
                        </div>
                    </div>
                    <form class="mt-10 w-full text-right" method="POST"
                        action="{{ route('candidates.destroy', $candidate) }}">
                        @csrf
                        @method('DELETE')
                        <x-button.button-danger type="submit" onclick="return confirm('Yakin ingin menghapus ini?')">Hapus
                        </x-button.button-danger>
                    </form>
                </div>
            @endforeach
        @else
            <p>Data kandidat masih kosong</p>
        @endif
    </section>
@endsection
