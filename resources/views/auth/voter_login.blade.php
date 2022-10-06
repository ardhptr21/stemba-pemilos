@extends('layouts.base', ['title' => 'Voter Login'])
@section('content')
    <x-base.section class="flex flex-col items-center justify-center min-h-screen bg-texture" x-data="{ isStudent: {{ $errors->has('nip') ? 'false' : 'true' }} }">
        <div class="w-full flex justify-between items-center mb-10">
            <img class="w-10 md:w-32" src="/assets/images/smkn7smg.png" alt="logo smk n 7 semarang">
            <h1 class="text-xl md:text-5xl text-center font-bold uppercase">Pemilos SMK N 7 Semarang</h1>
            <img class="w-10 md:w-32" src="/assets/images/osis.png" alt="logo osis">
        </div>
        <div
            class="w-11/12 p-12 px-6 py-10 mx-auto bg-white border rounded-md shadow-md border-primary-bold sm:w-8/12 md:w-6/12 lg:w-5/12 2xl:w-4/12 sm:px-10 sm:py-6 lg:shadow-lg">

            <h2 class="text-3xl font-semibold text-center text-gray-800 lg:text-4xl">
                Login
            </h2>

            <form class="mt-10 space-y-5" method="POST" action="{{ route('auth.voter_login_logged') }}" autocomplete="off">
                @csrf
                <span x-show="isStudent">
                    <x-form.input name="nis" x-bind:disabled="!isStudent" type="text" label="NIS"
                        placeholder="Masukkan NIS" error="{{ $errors->first('nis') }}" />
                </span>
                <span x-show="!isStudent">
                    <x-form.input name="nip" x-bind:disabled="isStudent" type="text" label="NIP"
                        placeholder="Masukkan NIP" error="{{ $errors->first('nip') }}" />
                </span>
                <input type="hidden" name="type" x-bind:value="isStudent ? 'student' : 'teacher'">

                <x-form.input name="password" type="password" error="{{ $errors->first('password') }}" label="Password"
                    placeholder="Masukkan password" />
                @if (session('error'))
                    <x-alert.danger>{{ session('error') }}</x-alert.danger>
                @endif

                <x-button.button-primary type="submit" class="w-full">Login</x-button.button-primary>
            </form>
            <div class="mt-5">
                <a href="{{ route('auth.admin_login') }}">
                    <h5 class="font-medium text-center hover:underline">Login Admin</h5>
                </a>
            </div>
        </div>

        <div
            class="flex items-center justify-center w-11/12 mx-auto mt-5 overflow-hidden bg-white border rounded-md shadow-md border-primary-bold sm:w-8/12 md:w-6/12 lg:w-5/12 2xl:w-4/12 lg:shadow-lg">
            <button class="w-full h-full px-2 py-4 font-bold transition duration-300 text-primary-bold"
                x-bind:class="{ 'bg-primary-bold': isStudent, 'text-white': isStudent }"
                @click="isStudent = true">Murid</button>
            <button class="w-full h-full px-2 py-4 font-bold transition duration-300 text-primary-bold"
                x-bind:class="{ 'bg-primary-bold': !isStudent, 'text-white': !isStudent }"
                @click="isStudent = false">Guru</button>
        </div>


    </x-base.section>
@endsection
