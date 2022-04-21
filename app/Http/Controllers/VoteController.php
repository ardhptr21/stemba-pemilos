<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index()
    {

        $voter = session()->get('voter');

        if (!isset($voter)) {
            return to_route('auth.voter_login');
        }

        return view('vote.index');
    }
}
