<?php

namespace App\Exports;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TeachersExport implements FromCollection, WithHeadings, WithMapping
{
    public Collection $teachers;

    public function __construct(Collection $teachers)
    {
        $this->teachers = $teachers;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->teachers;
    }

    public function headings(): array
    {
        return ['Nama', 'NIP',  'Status'];
    }

    public function map($teacher): array
    {
        return [
            $teacher->name,
            $teacher->nip,
            $this->changeStatus($teacher->status)
        ];
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
