<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        if (User::create($validatedData)) {
            return redirect('/')->with('success', 'Registrasi berhasil. Silahkan login.');
        } else {
            return redirect()->back()->with('error', 'Registrasi gagal. Silahkan coba lagi.');
        }
    }
}
