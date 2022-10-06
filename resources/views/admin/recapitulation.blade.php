@extends('layouts.admin', ['title' => 'Admin Rekapitulasi', 'admin_title' => 'Rekapitulasi'])
@section('content')
    <div class="w-full px-6">
        @if (session('success'))
            <x-alert.success>{{ session('success') }}</x-alert.success>
        @elseif (session('error'))
            <x-alert.danger>{{ session('error') }}</x-alert.danger>
        @endif
        <div class="p-10 border-2 space-y-3 bg-red-50 border-red-500 mb-10 rounded-lg">
            <h3 class="text-4xl font-bold text-red-500">Zona Bahaya</h3>
            <p>Harap perhatikan! aksi dibawah ini adalah berbahaya, dapat menyebabkan adanya kehilangan data, pastikan bahwa
                apa yang akan dilakukan sudah benar.</p>
            <div class="mt-5">
                <form class="inline-block" method="POST" action="{{ route('students.truncate') }}">
                    @csrf
                    @method('DELETE')
                    <x-button.button-danger type="submit"
                        onclick="return confirm('Yakin ingin menghapus semua data siswa?')">Kosongkan semua data siswa
                    </x-button.button-danger>
                </form>
                <form class="inline-block" method="POST" action="{{ route('teachers.truncate') }}">
                    @csrf
                    @method('DELETE')
                    <x-button.button-danger type="submit"
                        onclick="return confirm('Yakin ingin menghapus semua data guru?')">Kosongkan
                        semua data guru</x-button.button-danger>
                </form>
            </div>
        </div>
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
                    @foreach ($fields['classes'] as $class)
                        <option value="{{ $class }}" @selected(Request::get('{{ $class }}') == '{{ $class }}')>{{ $class }}</option>
                    @endforeach
                </x-form.dropdown>

                <x-form.dropdown x-init=""
                    @change="addUrlSearchParams({ key: 'major', value: $el.selectedOptions[0].value})" label="Jurusan">
                    <option value="">Semua</option>
                    @foreach ($fields['majors'] as $major)
                        <option value="{{ $major }}" @selected(Request::get('major') == '{{ $major }}')>{{ $major }}</option>
                    @endforeach
                </x-form.dropdown>



                <x-form.dropdown label="Indeks" x-init=""
                    @change="addUrlSearchParams({ key: 'index', value: $el.selectedOptions[0].value})">
                    <option value="">Semua</option>
                    <option value="1" @selected(Request::get('index') == '1')>1</option>
                    <option value="2" @selected(Request::get('index') == '2')>2</option>
                    <option value="3" @selected(Request::get('index') == '3')>3</option>
                    <option value="4" @selected(Request::get('index') == '4')>4</option>
                    <option value="5" @selected(Request::get('index') == '5')>5</option>
                </x-form.dropdown>
            @endif


        </div>
        @if ((Request::get('role') == 'student' && count($students_voter)) ||
            (Request::get('role') == 'teacher' && count($teachers_voter)))
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
                                    <x-table.th>KODE</x-table.th>
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
        @else
            <p class="mt-5">Tidak ada data yang ditemukan atau kosong</p>
        @endif


        @if (Request::get('role') == 'student')
            <div class="mt-5">{{ $students_voter->links() }}</div>
        @elseif (Request::get('role') == 'teacher')
            <div class="mt-5">{{ $teachers_voter->links() }}</div>
        @endif
    </div>
@endsection
