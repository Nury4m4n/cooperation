<?php

namespace App\Http\Controllers;

use App\Models\MandatorySaving;
use Illuminate\Http\Request;
use App\Models\Customer;

class MandatorySavingController extends Controller
{

    public function index()
    {
        $customers = Customer::all();
        $mandatorySavings = MandatorySaving::orderBy('id', 'DESC')->get();
        return view('mandatory_savings.index', compact('customers', 'mandatorySavings'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('mandatory_savings.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'amount' => 'required'
        ]);
        $mandatorySaving = new MandatorySaving();
        $mandatorySaving->date = date('Y-m-d');
        $mandatorySaving->customer_id = $request->customer_id;
        $mandatorySaving->amount = $request->amount;

        if ($mandatorySaving->save()) {
            return redirect()->route('mandatory-saving.index')->with('success', 'Pembayaran Berhasil');
        } else {
            dd('Data Gagal di simpan: ');
        }
    }
    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request)
    {
    }

    public function destroy($id)
    {
        $mandatorySaving = MandatorySaving::find($id);
        if ($mandatorySaving->delete()) {
            return redirect()->route('mandatory-saving.index')->with('success', "Data Pembayaran Berhasil Di hapus");
        } else {
            dd('Data Gagal di simpan: ');
        }
    }
}
