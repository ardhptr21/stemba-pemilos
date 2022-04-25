@extends('layouts.admin')

@section('content')
    <div class="w-full px-6">
        <div class="">
            <div class="flex items-center justify-start gap-3">
                <x-form.dropdown label="Status">
                    <x-form.option>Semua</x-form.option>
                    <x-form.option>Sudah Memilih</x-form.option>
                    <x-form.option>Belum Memilih</x-form.option>
                </x-form.dropdown>

                <x-form.dropdown label="Kelas">
                    <x-form.option>X</x-form.option>
                    <x-form.option>XI</x-form.option>
                    <x-form.option>XII</x-form.option>
                    <x-form.option>XIII</x-form.option>
                </x-form.dropdown>

                <x-form.dropdown label="Indeks">
                    <x-form.option>1</x-form.option>
                    <x-form.option>2</x-form.option>
                    <x-form.option>3</x-form.option>
                    <x-form.option>4</x-form.option>
                </x-form.dropdown>
            </div>
        </div>
        <div class="bg-white">
            <div class="overflow-x-auto mt-7">
                <x-table.container>
                    <x-slot:head>
                        <x-table.tr-head>
                            <x-table.th>No</x-table.th>
                            <x-table.th>Pemilih</x-table.th>
                            <x-table.th>Kelas Jurusan</x-table.th>
                            <x-table.th>Status</x-table.th>
                        </x-table.tr-head>
                    </x-slot:head>
                    <x-slot:body>
                        <x-table.tr-body>
                            <x-table.td>1.</x-table.td>
                            <x-table.td>Bintang</x-table.td>
                            <x-table.td>XI SIJA 1</x-table.td>
                            <x-table.td>
                                <x-capsule.danger>Belum</x-capsule.danger>
                            </x-table.td>
                        </x-table.tr-body>
                        <x-table.tr-body>
                            <x-table.td>2.</x-table.td>
                            <x-table.td>Naufal</x-table.td>
                            <x-table.td>XI SIJA 1</x-table.td>
                            <x-table.td>
                                <x-capsule.success>Sudah</x-capsule.success>
                            </x-table.td>
                        </x-table.tr-body>
                    </x-slot:body>
                </x-table.container>
            </div>
        </div>
    </div>
@endsection
