<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProducerController extends Controller
{
    public function index()
    {
        return view('producer.index');
    }

    public function create()
    {
        return view('producer.create');
    }

    public function edit()
    {
        return view('producer.edit');
    }

    public function delete()
    {
        return view('producer.delete');
    }
}
