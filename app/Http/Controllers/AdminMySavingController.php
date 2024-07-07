<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\MySaving;
use Illuminate\Http\Request;

class AdminMySavingController extends Controller
{

    public function index()
    {

        $customers = Customer::all();
        $mySavings = MySaving::orderBy('id', 'DESC')->get();
        return view('admin.my_saving.index', compact('customers', 'mySavings'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('admin.my_saving.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'amount' => 'required'
        ]);
        $mySaving = new MySaving();
        $mySaving->date = date('Y-m-d');
        $mySaving->customer_id = $request->customer_id;
        $mySaving->amount = $request->amount;

        if ($mySaving->save()) {
            return redirect()->route('admin-my-saving.index')->with('success', 'Pembayaran Berhasil');
        } else {
            dd('Data Gagal di simpan: ');
        }
    }
    public function show($id)
    {
        $mySavings = MySaving::find($id);

        $customer = Customer::find($id);
        return view('admin.my_saving.show', compact('customer', 'mySavings'));;
    }

    public function edit($id)
    {
    }

    public function update(Request $request)
    {
    }

    public function destroy($id)
    {
        $mySaving = MySaving::find($id);
        if ($mySaving->delete()) {
            return redirect()->route('admin-my-saving.index')->with('success', "Data Pembayaran Berhasil Di hapus");
        } else {
            dd('Data Gagal di simpan: ');
        }
    }
}
