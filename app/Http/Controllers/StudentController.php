<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function export(Request $request)
    {
        $students = Student::filter($request)->get(['name', 'nis', 'class', 'major', 'index', 'status']);
        return Excel::download(new StudentsExport($students), 'voting_siswa.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new StudentsImport, $request->file('file'));

        return back()->with('success', 'Data siswa berhasil diimport');
    }

    public function truncate()
    {
        Student::truncate();
        return back()->with('success', 'Data siswa berhasil dikosongkan');
    }
}
