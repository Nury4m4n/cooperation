<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
// {
//     public function index()
//     {
//         $name = "Nuryaman";
//         $grade = 100;
//         return view('people.index', compact('name', 'grade'));
//     }

// }
{
    public function index()
    {
    }

    // Method untuk memanggil form
    public function create()
    {
        return view('people.create');
    }

    // Method untuk mengambil inputan form
    public function store(Request $request)
    {
        // validasi
        $this->validate($request, [
            'name' => 'required'
        ]);
        // dd($request);
        $name = $request->name;
        //
        return view('people.show', compact('name'));
    }
}
