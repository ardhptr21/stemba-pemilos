@extends('layouts.base')

@section('content')
    <x-base.section class="bg-texture relative flex justify-center items-center min-h-screen">
        <div class="absolute left-5 top-5">
            <a href="{{ route('vote.index') }}">
                <h5 class="inline-flex font-semibold justify-center group items-center text-primary-bold ">
                    <span class="transition duration-300 transform group-hover:-translate-x-2 ease-in-out">
                        <svg class="w-5 h-5 text-primary-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </span> Kembali
                </h5>
            </a>
        </div>



        <div
            class="lg:w-3/4 w-full lg:h-auto h-full lg:my-auto my-20 rounded-md lg:flex-row flex-col overflow-hidden flex shadow-md">
            <div class="w-full h-96 bg-gray-400" style="flex: 1">
                <img src="https://source.unsplash.com/300x500?anime" alt="">
            </div>
            <div class="w-full bg-white lg:h-96 h-full" style="flex: 2">
                <div class="space-y-10 lg:overflow-x-auto h-full px-10 py-10">
                    <div class="space-y-3">
                        <h1 class="text-3xl font-bold text-primary-bold">
                            Kandidat 1
                        </h1>
                        <p class="text-lg capitalize text-primary-light">
                            bersama satu kita maju, tetap semangat wujudkan tekad!
                        </p>
                        <hr class="bg-primary-bold h-[3px]">
                    </div>


                    <div class="space-y-3">
                        <h3 class="text-2xl font-bold text-primary-bold">
                            Visi
                        </h3>
                        <p class="font-semibold text-primary-extralight ">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus fuga similique dolore
                            voluptatibus vero officiis sed explicabo aut quaerat unde.
                        </p>
                    </div>

                    <div class="space-y-3">
                        <h3 class="text-2xl font-bold text-primary-bold">
                            Misi
                        </h3>
                        <ol class="list-outside ml-4 list-decimal text-primary-extralight space-y-1">
                            <li>Mengutamakan iman dan takqa
                                serta
                                solidaritas dalam segala aspek</li>
                            <li>Mengoptimalkan peran serta
                                fungsi
                                OSIS sebagai penyelenggara berbagai kegiatan OSIS</li>
                            <li>Lorem ipsum, dolor sit amet
                                consectetur adipisicing elit. Perferendis, nihil.</li>
                            <li>Lorem ipsum, dolor sit amet
                                consectetur adipisicing elit. Perferendis, nihil.</li>
                            <li>Lorem ipsum, dolor sit amet
                                consectetur adipisicing elit. Perferendis, nihil.</li>
                            <li>Lorem ipsum, dolor sit amet
                                consectetur adipisicing elit. Perferendis, nihil.</li>
                            <li>Lorem ipsum, dolor sit amet
                                consectetur adipisicing elit. Perferendis, nihil.</li>
                            <li>Lorem ipsum, dolor sit amet
                                consectetur adipisicing elit. Perferendis, nihil.</li>
                            <li>Lorem ipsum, dolor sit amet
                                consectetur adipisicing elit. Perferendis, nihil.</li>
                            <li>Lorem ipsum, dolor sit amet
                                consectetur adipisicing elit. Perferendis, nihil.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </x-base.section>
@endsection
