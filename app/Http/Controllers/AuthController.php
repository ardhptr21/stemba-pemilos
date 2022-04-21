<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function voter_login()
    {
        return view('auth.voter_login');
    }

    public function voter_login_logged(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string|in:teacher,student',
            'nis' => 'required_if:type,student|numeric|digits:10',
            'nip' => 'required_if:type,teacher|numeric|digits:18',
            'password' => 'required|string',
        ]);

        $voter = null;
        if ($validated['type'] == 'student') {
            $voter = Student::where('nis', $validated['nis'])->first();
        } else {
            $voter = Teacher::where('nip', $validated['nip'])->first();
        }

        if (!$voter) {
            return back();
        }

        if ($voter->password != $validated['password']) {
            return back();
        }

        session()->put('voter', [
            'type' => $validated['type'],
            'id' => $voter->id
        ]);

        return to_route('vote.index');
    }
}
