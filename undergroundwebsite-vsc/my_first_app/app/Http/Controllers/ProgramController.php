<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        return view('program.index');
    }

    public function create()
    {
        return view('program.create');
    }

    public function edit()
    {
        return view('program.edit');
    }

    public function delete()
    {
        return view('program.delete');
    }
}
