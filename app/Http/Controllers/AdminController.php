<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $candidates = Candidate::with(['teachers', 'students'])->get();
        $students = Student::all();
        $teachers = Teacher::all();

        $total_all = $students->count() + $teachers->count();
        $total_all_is_done = $students->filter(fn ($s) => $s->isDone($s))->count() + $teachers->filter(fn ($t) => $t->isDone($t))->count();

        $percent_of_all = number_format($total_all_is_done / $total_all * 100, 1);
        $each_candidate_percent = $candidates->map(function ($candidate) use ($total_all) {
            return number_format((($candidate->students->count() + $candidate->teachers->count()) / $total_all) * 100, 1);
        })->toArray();


        return view('admin.index', compact('each_candidate_percent', 'percent_of_all'));
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
            $students_voter = Student::filter($request)
                ->orderBy('class')
                ->orderBy('major')
                ->orderBy('index')
                ->orderBy('name')
                ->paginate(25)
                ->withQueryString();
        } else if ($request->get('role') == 'teacher') {
            $teachers_voter = Teacher::filter($request)
                ->orderBy('name')
                ->paginate(25)
                ->withQueryString();
        }
        return view('admin.recapitulation', compact('students_voter', 'teachers_voter'));
    }
}
