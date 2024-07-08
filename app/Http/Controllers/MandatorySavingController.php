<?php

namespace App\Http\Controllers;

use App\Models\MandatorySaving;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class MandatorySavingController extends Controller
{

    public function index()
    {

        $customer = Customer::where('user_id', Auth::id())->first();
        $mandatorySavings = MandatorySaving::where('customer_id', $customer->id)->orderBy('id', 'DESC')->get();
        return view('mandatory_savings.index', compact('customer', 'mandatorySavings'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required'
        ]);

        $customer = Customer::where('user_id', Auth::id())->first();

        $mandatorySaving = new MandatorySaving();
        $mandatorySaving->date = now()->toDateString();
        $mandatorySaving->customer_id = $customer->id;
        $mandatorySaving->amount = $request->amount;

        if ($mandatorySaving->save()) {
            return redirect()->route('mandatory-saving.index')->with('success', 'Pembayaran Berhasil');
        } else {
            return redirect()->back()->with('error', 'Data Gagal di simpan');
        }
    }

}