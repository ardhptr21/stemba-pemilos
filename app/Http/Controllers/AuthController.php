<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return back()->with('error', $validated['type'] == 'student' ? 'NIS tidak ditemukan' : 'NIP tidak ditemukan');
        }

        if ($voter->status == 'done') {
            return back()->with('error', $validated['type'] == 'student' ? 'Siswa tersebut sudah melakukan pemilihan' : 'Guru tersebut sudah melakukan pemilihan');
        }

        if ($voter->password != $validated['password']) {
            return back()->with('error', 'Password salah');
        }

        session()->put('voter', [
            'type' => $validated['type'],
            'id' => $voter->id
        ]);

        return to_route('vote.index');
    }

    public function admin_login()
    {
        return view('auth.admin_login');
    }

    public function admin_login_logged(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($validated)) {
            return to_route('admin.index');
        }

        return back()->with('error', 'Email atau password salah');
    }


    public function logout()
    {
        session()->forget('voter');
        session()->invalidate();
        session()->regenerateToken();
        Auth::logout();
        return to_route('vote.index');
    }
}
