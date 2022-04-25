@extends('layouts.admin')

@section('content')
    <div class="w-full p-20 mx-auto bg-white border rounded-md shadow-md">
        <form class="space-y-5 " autocomplete="off">
            <x-form.input name="chairman" type="text" label="Nama Ketua" placeholder="Masukkan nama calon ketua" />
            <x-form.input name="vice_chairman" type="text" label="Nama Wakil Ketua"
                placeholder="Masukkan nama calon wakil ketua" />
            <x-form.input name="foto" type="url" label="Foto" placeholder="Masukkan link foto calon" />
            <x-form.input name="motto" type="text" label="Motto" placeholder="Masukkan motto" />
            <x-form.input name="vision" type="text" label="Visi" placeholder="Masukkan visi" />
            <x-form.textarea name="mision" type="text" label="Misi" placeholder="Masukkan misi" rows="8" />
            <x-button.button-primary type="submit" class="w-full">Tambah</x-button.button-primary>
        </form>
    </div>
@endsection
