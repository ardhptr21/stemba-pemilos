<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {

        $candidates = Candidate::with(['teachers', 'students'])->get();
        $students = Student::all();
        $teachers = Teacher::all();

        $total_all = $students->count();
        $total_all_is_done = $students->filter(fn ($s) => $s->isDone($s))->count();

        if ($request->get('student_only') != 'true') {
            $total_all += $teachers->count();
            $total_all_is_done += $teachers->filter(fn ($t) => $t->isDone($t))->count();
        }

        $divided = $total_all == 0 ? 0 : $total_all_is_done / $total_all * 100;
        $percent_of_all = number_format($divided, 1);
        $each_candidate_percent = $candidates->map(function ($candidate) use ($total_all, $request) {
            if ($total_all == 0) {
                return 0.0;
            }
            $voted_count_total = $candidate->students->count();

            if ($request->get('student_only') != 'true') {
                $voted_count_total += $candidate->teachers->count();
            }

            return number_format(($voted_count_total / $total_all) * 100, 1);
        })->toArray();


        return view('admin.index', compact('each_candidate_percent', 'percent_of_all'));
    }

    public function recapitulation(Request $request)
    {
        if ($request->get('role') != 'student' && $request->get('role') != 'teacher') {
            return to_route('admin.recapitulation', ['role' => 'student']);
        }

        $students_voter = [];
        $teachers_voter = [];
        $fields = [];

        if ($request->get('role') == 'student') {
            $students_voter = Student::filter($request)
                ->orderBy('class')
                ->orderBy('major')
                ->orderBy('index')
                ->orderBy('name')
                ->paginate(25)
                ->withQueryString();

            $fields = [
                'majors' => Student::distinct()->get(['major'])->pluck('major')->toArray(),
                'classes' => Student::distinct()->get(['class'])->pluck('class')->toArray(),
            ];
        } else if ($request->get('role') == 'teacher') {
            $teachers_voter = Teacher::filter($request)
                ->orderBy('name')
                ->paginate(25)
                ->withQueryString();
        }
        return view('admin.recapitulation', compact('students_voter', 'teachers_voter', 'fields'));
    }

    public function changePassword(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'new_password_confirmation' => 'required|same:new_password'
        ]);


        $isMatch = Hash::check($validated['old_password'], auth()->user()->password);

        if (!$isMatch) {
            return back()->withErrors(['old_password' => 'Old password is not match']);
        }

        if ($validated['old_password'] == $validated['new_password']) {
            return back()->with('error', 'New password must be different from old password');
        }

        $result = auth()->user()->update([
            'password' => $validated['new_password']
        ]);

        if (!$result) {
            return back()->with('error', 'Failed to change password');
        }

        return back()->with('success', 'Password changed successfully');
    }

    public function candidates()
    {
        $candidates = Candidate::all();
        return view('admin.candidates', compact('candidates'));
    }
}
