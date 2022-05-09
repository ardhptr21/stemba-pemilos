@extends('layouts.admin')
@section('content')
    <div class="w-full px-6">
        <div class="flex items-center justify-start gap-3">
            <x-form.dropdown label="Role" x-init=""
                @change="window.location.href = `{{ route('admin.recapitulation') }}?role=${$el.selectedOptions[0].value}`">
                <option @selected(Request::get('role') == 'student') value="student">Siswa</option>
                <option @selected(Request::get('role') == 'teacher') value="teacher">Guru</option>
            </x-form.dropdown>

            <x-form.dropdown label="Status" x-init=""
                @change="addUrlSearchParams({ key: 'status', value: $el.selectedOptions[0].value})">
                <option value="">Semua</option>
                <option value="done" @selected(Request::get('status') == 'done')>Sudah Memilih</option>
                <option value="not_done" @selected(Request::get('status') == 'not_done')>Belum Memilih</option>
            </x-form.dropdown>

            @if (Request::get('role') == 'student')
                <x-form.dropdown x-init=""
                    @change="addUrlSearchParams({ key: 'class', value: $el.selectedOptions[0].value})" label="Kelas">
                    <option value="">Semua</option>
                    <option value="10" @selected(Request::get('class') == '10')>X</option>
                    <option value="11" @selected(Request::get('class') == '11')>XI</option>
                    <option value="12" @selected(Request::get('class') == '12')>XII</option>
                    <option value="13" @selected(Request::get('class') == '13')>XIII</option>
                </x-form.dropdown>

                <x-form.dropdown x-init=""
                    @change="addUrlSearchParams({ key: 'major', value: $el.selectedOptions[0].value})" label="Jurusan">
                    <option value="">Semua</option>
                    'TME', 'KGSP', 'TFLM', 'TEDK', 'SIJA', 'KJIJ', 'TMPO', 'TTL'
                    <option value="TME" @selected(Request::get('major') == 'TME')>TME</option>
                    <option value="KGSP" @selected(Request::get('major') == 'KGSP')>KGSP</option>
                    <option value="TFLM" @selected(Request::get('major') == 'TFLM')>TFLM</option>
                    <option value="TEDK" @selected(Request::get('major') == 'TEDK')>TEDK</option>
                    <option value="SIJA" @selected(Request::get('major') == 'SIJA')>SIJA</option>
                    <option value="KJIJ" @selected(Request::get('major') == 'KJIJ')>KJIJ</option>
                    <option value="TMPO" @selected(Request::get('major') == 'TMPO')>TMPO</option>
                    <option value="TTL" @selected(Request::get('major') == 'TTL')>TTL</option>
                </x-form.dropdown>



                <x-form.dropdown label="Indeks" x-init=""
                    @change="addUrlSearchParams({ key: 'index', value: $el.selectedOptions[0].value})">
                    <option value="">Semua</option>
                    <option value="1" @selected(Request::get('index') == '1')>1</option>
                    <option value="2" @selected(Request::get('index') == '2')>2</option>
                    <option value="3" @selected(Request::get('index') == '3')>3</option>
                    <option value="4" @selected(Request::get('index') == '4')>4</option>
                </x-form.dropdown>
            @endif


        </div>
        <div class="mt-5">
            <a href="{{ route('export.' . Request::get('role') . 's', Request::all()) }}">
                <x-button.button-success class="bg-green-500">Export</x-button.button-success>
            </a>
        </div>
        <div class="bg-white">
            <div class="overflow-x-auto mt-7">
                <x-table.container>
                    <x-slot:head>
                        <x-table.tr-head>
                            <x-table.th>No</x-table.th>
                            <x-table.th>Pemilih</x-table.th>
                            @if (Request::get('role') == 'student')
                                <x-table.th>Kelas Jurusan</x-table.th>
                                <x-table.th>NIS</x-table.th>
                            @elseif (Request::get('role') == 'teacher')
                                <x-table.th>NIP</x-table.th>
                            @endif
                            <x-table.th>Status</x-table.th>
                        </x-table.tr-head>
                    </x-slot:head>
                    <x-slot:body>
                        @if (Request::get('role') == 'student')
                            @foreach ($students_voter as $student)
                                <x-table.tr-body>
                                    <x-table.td>
                                        {{ $loop->iteration + $students_voter->firstItem() - 1 }}
                                    </x-table.td>
                                    <x-table.td>{{ $student->name }}</x-table.td>
                                    <x-table.td>{{ $student->class }} {{ $student->major }} {{ $student->index }}
                                    </x-table.td>
                                    <x-table.td>{{ $student->nis }}</x-table.td>
                                    <x-table.td>
                                        @if ($student->status === 'done')
                                            <x-capsule.success>Sudah</x-capsule.success>
                                        @elseif ($student->status === 'not_done')
                                            <x-capsule.danger>Belum</x-capsule.danger>
                                        @endif
                                    </x-table.td>
                                </x-table.tr-body>
                            @endforeach
                        @elseif (Request::get('role') == 'teacher')
                            @foreach ($teachers_voter as $teacher)
                                <x-table.tr-body>
                                    <x-table.td>
                                        {{ $loop->iteration + $teachers_voter->firstItem() - 1 }}
                                    </x-table.td>
                                    <x-table.td>{{ $teacher->name }}</x-table.td>
                                    <x-table.td>{{ $teacher->nip }}</x-table.td>
                                    <x-table.td>
                                        @if ($teacher->status === 'done')
                                            <x-capsule.success>Sudah</x-capsule.success>
                                        @elseif ($teacher->status === 'not_done')
                                            <x-capsule.danger>Belum</x-capsule.danger>
                                        @endif
                                    </x-table.td>
                                </x-table.tr-body>
                            @endforeach
                        @endif
                    </x-slot:body>
                </x-table.container>
            </div>
        </div>

        @if (Request::get('role') == 'student')
            <div class="mt-5">{{ $students_voter->links() }}</div>
        @elseif (Request::get('role') == 'teacher')
            <div class="mt-5">{{ $teachers_voter->links() }}</div>
        @endif
    </div>
@endsection
