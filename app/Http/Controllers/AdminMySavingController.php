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
        $mySavings = MySaving::with('customer')
        ->orderBy('date', 'desc')
        ->paginate(10);

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
            return redirect()->route('admin-my-saving.index')->with('success', 'Data Pembayaran Berhasil Disimpan');
        } else {
            return redirect()->route('admin-my-saving.index')->with('error', 'Gagal menyimpan data pembayaran');
        }
    }

    public function show($id)
    {
        $mySaving = MySaving::find($id);
        if (!$mySaving) {
            return redirect()->route('admin-my-saving.index')->with('error', 'Data pembayaran tidak ditemukan.');
        }

        $customer = Customer::find($mySaving->customer_id);
        return view('admin.my_saving.show', compact('customer', 'mySaving'));
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
        if (!$mySaving) {
            return redirect()->route('admin-my-saving.index')->with('error', 'Data pembayaran tidak ditemukan.');
        }

        if ($mySaving->delete()) {
            return redirect()->route('admin-my-saving.index')->with('success', "Data Pembayaran Berhasil Dihapus");
        } else {
            return redirect()->route('admin-my-saving.index')->with('error', 'Gagal menghapus data pembayaran.');
        }
    }
}