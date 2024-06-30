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
        return view('mandatory_savings.index', compact('customers','mandatorySavings'));
    }
    public function create()
    {
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

        //insert into customers values ('name','address')
        // TRUE / FALSE
        // return true
        if ($mandatorySaving->save()) {
            return redirect()->route('mandatory-saving.index')->with('succses', 'Data Berhasil ditambahkan');
        } else {
            dd('Data Gagal di simpan: ');
        }
    }

    public function show($mandatorySaving)
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
    }
}