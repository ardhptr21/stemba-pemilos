<?php

namespace App\Http\Controllers;

use App\Exports\TeachersExport;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    public function export(Request $request)
    {
        $teachers = Teacher::filter($request)->get(['name', 'nip', 'status']);
        return Excel::download(new TeachersExport($teachers), 'voting_guru.xlsx');
    }
}
