@extends('layouts.admin')


@section('content')
    <section class="space-y-10">

        <div class="flex items-center justify-between space-x-4">
            <x-card.card-overview title="Persentasi Pemilih" value="97.2%">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                </svg>
            </x-card.card-overview>
            <x-card.card-overview title="Paslon 1" value="34.2%">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                </svg>
            </x-card.card-overview>
            <x-card.card-overview title="Paslon 2" value="25.4%">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                </svg>
            </x-card.card-overview>
            <x-card.card-overview title="Paslon 3" value="40.4%">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                </svg>
            </x-card.card-overview>
        </div>


        <div class="overflow-hidden rounded-lg shadow-lg">
            <div class="px-5 py-3 bg-gray-50">Presentasi Voting Kandidat</div>
            <canvas class="p-10 bg-white" id="chartBar"></canvas>
        </div>
    </section>

    <script>
        const labelsBarChart = [
            "Kanddat 1",
            "Kandidat 2",
            "Kandidat 3",
        ]

        const dataBarChart = {
            labels: labelsBarChart,
            datasets: [{
                label: "Persentasi Voting Kandidat",
                backgroundColor: [
                    "#180A0A",
                    "#711A75",
                    "#F10086",
                ],
                borderColor: "#868dad",
                data: [87, 90, 76],
            }, ],
        };

        const configBarChart = {
            type: "bar",
            data: dataBarChart,
            options: {
                scales: {
                    y: {
                        suggestedMax: 100
                    }
                }
            },
        };

        document.addEventListener('DOMContentLoaded', () => {
            var chartBar = new Chart(
                document.getElementById("chartBar"),
                configBarChart
            );
        })
    </script>
@endsection
