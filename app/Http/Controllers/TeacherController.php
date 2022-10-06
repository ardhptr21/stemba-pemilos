<?php

namespace App\Http\Controllers;

use App\Exports\TeachersExport;
use App\Imports\TeachersImport;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    public function export(Request $request)
    {
        $teachers = Teacher::filter($request)->get(['name', 'nip', 'status']);
        return Excel::download(new TeachersExport($teachers), 'voting_guru.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new TeachersImport, $request->file('file'));
        return back()->with('success', 'Data guru berhasil diimport');
    }

    public function truncate()
    {
        Teacher::truncate();
        return back()->with('success', 'Data guru berhasil dihapus');
    }
}
