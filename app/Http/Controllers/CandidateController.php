<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function show(Candidate $candidate)
    {
        return view('candidates.show', compact('candidate'));
    }
}
