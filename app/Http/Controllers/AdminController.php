<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function candidate()
    {
        return view('admin.candidate');
    }

    public function recapitulation(Request $request)
    {
        $students_voter = [];
        $teachers_voter = [];

        if ($request->get('role') == 'student') {
            $students_voter = Student::paginate(25)->withQueryString();
        } else if ($request->get('role') == 'teacher') {
            $teachers_voter = Teacher::paginate(25)->withQueryString();
        }
        return view('admin.recapitulation', compact('students_voter', 'teachers_voter'));
    }
}
