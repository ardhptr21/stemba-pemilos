@extends('layouts.admin', ['admin_title' => 'Ganti Password', 'title' => 'Admin Ganti Password'])

@section('content')
    <div class="w-3/4 p-20 mx-auto bg-white border rounded-md shadow-md">
        <form class="space-y-5" autocomplete="off" method="POST">
            @csrf
            @method('PUT')
            <x-form.input error="{{ $errors->first('old_password') }}" name="old_password" type="password" label="Password lama"
                placeholder="Masukkan password lama" />
            <x-form.input error="{{ $errors->first('new_password') }}" name="new_password" type="password"
                label="Password baru" placeholder="Masukkan password baru" />
            <x-form.input error="{{ $errors->first('new_password_confirmation') }}" name="new_password_confirmation"
                type="password" label="Password baru" placeholder="Konfirmasi password baru" />
            <x-button.button-primary type="submit" class="w-full">Ganti</x-button.button-primary>
        </form>
        @if (session('success'))
            <x-alert.success>{{ session('success') }}</x-alert.success>
        @elseif (session('error'))
            <x-alert.danger>{{ session('error') }}</x-alert.danger>
        @endif
    </div>
@endsection
