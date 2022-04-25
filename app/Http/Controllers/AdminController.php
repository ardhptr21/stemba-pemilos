<?php

namespace App\Http\Controllers;

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

    public function recapitulation()
    {
        return view('admin.recapitulation');
    }
}
