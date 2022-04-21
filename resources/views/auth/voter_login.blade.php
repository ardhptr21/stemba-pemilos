@extends('layouts.base', ["title" => "Voter Login"])

@section('content')
    <x-base.section class="bg-texture min-h-screen flex justify-center items-center flex-col" x-data="{ isStudent: true }">
        <div
            class="w-11/12 p-12 px-6 py-10 border border-primary-bold mx-auto bg-white rounded-md shadow-md sm:w-8/12 md:w-6/12 lg:w-5/12 2xl:w-4/12 sm:px-10 sm:py-6 lg:shadow-lg">

            <h1 class="text-3xl font-semibold text-center text-gray-800 lg:text-4xl">
                Login
            </h1>

            <form class="mt-10 space-y-5" method="POST">
                <span x-show="isStudent">
                    <x-form.input name="nis" type="text" label="NIS" placeholder="Masukkan NIS" />
                </span>
                <span x-show="!isStudent">
                    <x-form.input name="nip" type="text" label="NIP" placeholder="masukkan NIP" />
                </span>
                <input type="hidden" name="type" x-bind:value="isStudent ? 'student' : 'teacher'">
                <x-form.input name="password" type="password" label="Password" placeholder="Masukkan password" />

                <x-button.button-primary type="submit" class="w-full">Login</x-button.button-primary>
            </form>
        </div>

        <div
            class="w-11/12 border border-primary-bold mx-auto bg-white rounded-md shadow-md sm:w-8/12 md:w-6/12 lg:w-5/12 2xl:w-4/12 lg:shadow-lg mt-5 flex justify-center items-center overflow-hidden">
            <button class="w-full text-primary-bold h-full px-2 py-4 font-bold transition duration-300"
                x-bind:class="{'bg-primary-bold': isStudent, 'text-white': isStudent}"
                @click="isStudent = true">Murid</button>
            <button class="w-full h-full px-2 py-4 font-bold transition duration-300 text-primary-bold"
                x-bind:class="{'bg-primary-bold': !isStudent, 'text-white': !isStudent}"
                @click="isStudent = false">Guru</button>
        </div>

    </x-base.section>
@endsection
