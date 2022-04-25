<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function voter_login()
    {
        return view('auth.voter_login');
    }

    public function admin_login()
    {
        return view('auth.admin_login');
    }
}
