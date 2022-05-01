@extends('layouts.base')

@section('content')
    <x-base.section class="flex flex-col items-center justify-center min-h-screen bg-texture">
        <div
            class="w-11/12 p-12 px-6 py-10 mx-auto bg-white border rounded-md shadow-md border-primary-bold sm:w-8/12 md:w-6/12 lg:w-5/12 2xl:w-4/12 sm:px-10 sm:py-6 lg:shadow-lg">

            <h1 class="text-3xl font-semibold text-center text-gray-800 lg:text-4xl">
                Admin Login
            </h1>

            <form class="mt-10 space-y-5" method="POST" autocomplete="off" action="{{ route('auth.admin_login_logged') }}">
                @csrf
                <x-form.input name="email" type="email" label="Email" placeholder="Masukkan Email"
                    error="{{ $errors->first('email') }}" />
                <x-form.input name="password" type="password" label="Password" placeholder="Masukkan password"
                    error="{{ $errors->first('password') }}" />
                @if (session('error'))
                    <x-alert.danger>{{ session('error') }}</x-alert.danger>
                @endif
                <x-button.button-primary type="submit" class="w-full">Login</x-button.button-primary>

                <div class="text-center">
                    <a href="{{ route('auth.voter_login') }}" class="font-medium hover:underline">
                        <h5>Login Voter</h5>
                    </a>
                </div>
            </form>
        </div>
    </x-base.section>
@endsection
