<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $name = "Nuryaman";
        $grade = 100;
        return view('people.index', compact('name', 'grade'));
    }
}
