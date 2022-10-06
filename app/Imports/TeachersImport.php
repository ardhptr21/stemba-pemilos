<?php

namespace App\Imports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeachersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (!collect($row)->only(['name', 'nip', 'password'])->every(function ($value) {
            return !empty($value);
        })) {
            return null;
        };
        return new Teacher([
            'name' => $row['name'],
            'nip' => $row['nip'],
            'password' => $row['password'],
        ]);
    }
}
