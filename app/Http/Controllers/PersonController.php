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

    // method untunk memanggil fors
    public function create()
    {
        return view('people.create');
    }

    // method untuk memanggil inputan fors
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        //dd($requset);
        $name = $request->name;
        echo $name;
        return view('people.show', compact('name'));
    }
}
