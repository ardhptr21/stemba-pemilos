<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (!collect($row)->only(['name', 'nis', 'class', 'major', 'index', 'password'])->every(function ($value) {
            return !empty($value);
        })) {
            return null;
        };
        return new Student([
            "name" => $row['name'],
            "nis" => $row['nis'],
            "class" => $row['class'],
            "major" => $row['major'],
            "index" => $row['index'],
            "password" => trim($row['password'])
        ]);
    }
}
