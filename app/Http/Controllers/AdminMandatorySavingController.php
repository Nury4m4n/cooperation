<?php

namespace App\Http\Controllers;

use App\Models\MandatorySaving;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminMandatorySavingController extends Controller
{

    public function index()
    {
        $customers = Customer::all();
        $mandatorySavings = MandatorySaving::orderBy('id', 'DESC')->get();
        return view('admin.mandatory_savings.index', compact('customers', 'mandatorySavings'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('admin.mandatory_savings.create', compact('customers'));
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
            return redirect()->route('admin-mandatory-saving.index')->with('success', 'Data Pembayaran Berhasil Disimpan');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data pembayaran');
        }
    }

    public function show($id)
    {
        $mandatorySaving = MandatorySaving::find($id);
        $customer = Customer::find($mandatorySaving->customer_id);

        if (!$mandatorySaving) {
            return redirect()->route('admin-mandatory-saving.index')->with('error', 'Data pembayaran tidak ditemukan');
        }

        return view('admin.mandatory_savings.show', compact('customer', 'mandatorySaving'));
    }

    public function edit($id)
    {
        // Tambahkan logika edit jika diperlukan
    }

    public function update(Request $request)
    {
        // Tambahkan logika update jika diperlukan
    }

    public function destroy($id)
    {
        $mandatorySaving = MandatorySaving::find($id);

        if (!$mandatorySaving) {
            return redirect()->route('admin-mandatory-saving.index')->with('error', 'Data pembayaran tidak ditemukan');
        }

        if ($mandatorySaving->delete()) {
            return redirect()->route('admin-mandatory-saving.index')->with('success', 'Data Pembayaran Berhasil Dihapus');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data pembayaran');
        }
    }
}
