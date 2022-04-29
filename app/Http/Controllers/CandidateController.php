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


    public function store(Request $request)
    {
        $validated = $request->validate([
            "chairman" => "required|string",
            "vice_chairman" => "required|string",
            "motto" => "required|string",
            "vision" => "required|string",
            "mission" => "required|string",
            "image" => "required|url",
        ]);

        $validated['mission'] =  join('', array_map(fn ($v) => "<li>" . htmlspecialchars(trim($v)) . "</li>", explode("<br />", nl2br($validated['mission']))));
        $validated['slug'] = uniqid();

        $candidate = Candidate::create($validated);

        if ($candidate) {
            return back()->with('success', 'Kandidat baru berhasil dibuat');
        }

        return back()->with('error', 'Kandidat baru gagal dibuat');
    }
}
