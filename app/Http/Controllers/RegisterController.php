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
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('succsess','Regitrasi Berhasil Silahkan Login');
        return redirect('/')->with('success', 'Regitrasi Berhasil Silahkan Login');

        //     $user = new User();
        //     $user->name = $request->name;
        //     $user->username = $request->username;
        //     $user->email = $request->email;
        //     $user->password = $request->password;

        //     if ($user->save()) {
        //         return view('customers.index');
        //     } else {
        //         dd('gagal');
        //     }
    }
}
