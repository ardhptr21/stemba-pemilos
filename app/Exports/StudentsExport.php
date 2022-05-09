<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;



class StudentsExport implements FromCollection, WithHeadings, WithMapping
{

    public Collection $students;


    public function __construct(Collection $students)
    {
        $this->students = $students;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->students;
    }

    public function map($student): array
    {
        return [
            $student->name,
            $student->nis,
            $student->class . ' ' . $student->major . ' ' . $student->index,
            $this->changeStatus($student->status)
        ];
    }

    public function headings(): array
    {
        return ['Nama', 'NIS', 'Kelas', 'Status'];
    }

    private function changeStatus(string $status)
    {
        switch ($status) {
            case 'done':
                return 'Sudah Voting';
                break;
            case 'not_done':
                return 'Belum Voting';
                break;
        };
    }
}
