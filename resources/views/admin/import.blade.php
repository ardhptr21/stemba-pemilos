@extends('layouts.admin', ['admin_title' => 'Import Data', 'title' => 'Admin Import Data'])

@section('content')
    <div class="w-3/4 p-20 mx-auto flex flex-col gap-5 bg-white border rounded-md shadow-md">
        @if (session('success'))
            <x-alert.success>{{ session('success') }}</x-alert.success>
        @elseif (session('error'))
            <x-alert.danger>{{ session('error') }}</x-alert.danger>
        @endif
        <h2 class="text-2xl text-center font-bold">Import Data Siswa</h2>
        <form enctype="multipart/form-data" class="space-y-5" autocomplete="off" method="POST"
            action="{{ route('import.students') }}">
            @csrf
            <x-form.input name="file" type="file" label="Data Siswa" accept=".xlsx,.csv" />
            <x-button.button-primary type="submit" class="w-full">Import</x-button.button-primary>
        </form>
        <h2 class="text-2xl text-center font-bold">Import Data Guru</h2>
        <form enctype="multipart/form-data" class="space-y-5" autocomplete="off" method="POST">
            @csrf
            <x-form.input name="file" type="file" label="Data Guru" accept=".xlsx,.csv" />
            <x-button.button-primary type="submit" class="w-full">Import</x-button.button-primary>
        </form>
    </div>
@endsection
