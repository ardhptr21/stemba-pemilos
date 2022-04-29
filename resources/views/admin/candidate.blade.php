@extends('layouts.admin')

@section('content')
    @if (session('success'))
        <x-alert.success>{{ session('success') }}</x-alert.success>
    @elseif (session('error'))
        <x-alert.danger>{{ session('error') }}</x-alert.danger>
    @endif
    <div class="w-full p-20 mx-auto bg-white border rounded-md shadow-md">
        <form class="space-y-5" autocomplete="off" method="POST" action="{{ route('candidates.store') }}">
            @csrf
            <x-form.input name="chairman" type="text" label="Nama Ketua" placeholder="Masukkan nama calon ketua"
                error="{{ $errors->first('chairman') }}" value="{{ old('chairman', '') }}" />
            <x-form.input name="vice_chairman" type="text" label="Nama Wakil Ketua"
                placeholder="Masukkan nama calon wakil ketua" error="{{ $errors->first('vice_chairman') }}"
                value="{{ old('vice_chairman', '') }}" />
            <x-form.input name="image" type="url" label="Foto" placeholder="Masukkan link foto calon"
                error="{{ $errors->first('image') }}" value="{{ old('image', '') }}" />
            <x-form.input name="motto" type="text" label="Motto" placeholder="Masukkan motto"
                error="{{ $errors->first('motto') }}" value="{{ old('motto', '') }}" />
            <x-form.input name="vision" type="text" label="Visi" placeholder="Masukkan visi"
                error="{{ $errors->first('vision') }}" value="{{ old('vision', '') }}" />
            <x-form.textarea name="mission" type="text" label="Misi" placeholder="Masukkan misi" rows="10"
                error="{{ $errors->first('mission') }}" info="Harap pisahkan setiap misi dengan enter (new line)"
                value="{{ old('mission', '') }}" />
            <x-button.button-primary type="submit" class="w-full">Tambah</x-button.button-primary>
        </form>
    </div>
@endsection
