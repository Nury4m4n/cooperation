<?php

namespace App\Http\Controllers;

use App\Models\MySaving;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class MySavingController extends Controller
{
    public function index()
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        $mySavings = MySaving::where('customer_id', $customer->id)->orderBy('id', 'DESC')->get();
        return view('my_saving.index', compact('customer', 'mySavings'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric'
        ]);

        $customer = Customer::where('user_id', Auth::id())->first();
        $mySaving = new MySaving();
        $mySaving->date = now()->toDateString();
        $mySaving->customer_id = $customer->id;
        $mySaving->amount = $request->amount;

        if ($mySaving->save()) {
            return redirect()->route('my-saving.index')->with('success', 'Pembayaran Berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan pembayaran.');
        }
    }
}