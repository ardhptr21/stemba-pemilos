<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index()
    {

        $voter = session()->get('voter');

        if (!isset($voter)) {
            return to_route('auth.voter_login');
        }

        $candidates = Candidate::select('slug', 'vision', 'image')->get();

        return view('vote.index', compact('candidates'));
    }

    public function submit(Candidate $candidate)
    {

        $voter = session()->get('voter');

        if (!isset($voter)) {
            return to_route('auth.voter_login');
        }

        if ($voter['type'] == 'student') {
            Student::where('id', $voter['id'])->update([
                'candidate_id' => $candidate->id,
                'status' => 'done'
            ]);
        } else {
            Teacher::where('id', $voter['id'])->update([
                'candidate_id' => $candidate->id,
                'status' => 'done'
            ]);
        }

        session()->forget('voter');
        session()->flash('voted', true);
        return to_route('vote.thanks');
    }

    public function thanks()
    {
        if (session()->has('voted')) {
            return view('vote.thanks');
        } else {
            return to_route('vote.index');
        }
    }
}
