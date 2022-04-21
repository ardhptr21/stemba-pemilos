@extends('layouts.base')

@section('content')
    <x-base.section class="bg-texture space-y-10">

        <div class="text-center space-y-3">
            <h1 class="text-4xl font-bold text-primary-bold">Pemilihan Kandidat</h1>
            <p class="font-semibold text-primary-light text-lg max-w-xl mx-auto">Gunakan hak pilih anda dengan tepat,
                jangan golput!</p>
        </div>

        <div class="grid md:grid-cols-3 gap-10">
            <x-card.card-candidate title="Kandidat 1"
                description="Harmonisasi kerukunan untuk mencapai revolusi kreativitas guna mewujudkan siswa siswi SMKN 7 Semarang aktif yang mampu bergerak secara lepas"
                image="https://source.unsplash.com/501x700?anime" />
            <x-card.card-candidate title="Kandidat 2"
                description="Menjadikan OSIS sebagai sarana untuk menampung aspirasi dan kreativitas siswa, untuk mewujudkan generasi muda yang kreatif, berwawasan global berideologi Pancasila, serta berlandaskan iman dan taqwa"
                image="https://source.unsplash.com/502x700?anime" />
            <x-card.card-candidate title="Kandidat 3"
                description="Unggul dalam prestasi dengan dilandasi akhlak mulia serta mewujudkan siswa yang aktif, kreatif, dan produktif baik dalam aspek akademik maupun non akademik"
                image="https://source.unsplash.com/503x700?anime" />
        </div>
    </x-base.section>
@endsection
