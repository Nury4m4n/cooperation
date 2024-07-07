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

    // public function create()
    // {
    //     $customer = Customer::where('user_id', Auth::id())->first();
    //     if (!$customer) {
    //         return redirect()->back()->with('error', 'Customer tidak ditemukan');
    //     }
    //     return view('my_saving.create', compact('customer'));
    // }

    public function store(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required'
        ]);

        $customer = Customer::where('user_id', Auth::id())->first();

        // if (!$customer) {
        //     return redirect()->back()->with('error', 'Customer tidak ditemukan');
        // }

        $mySaving = new MySaving();
        $mySaving->date = now()->toDateString();
        $mySaving->customer_id = $customer->id;
        $mySaving->amount = $request->amount;

        if ($mySaving->save()) {
            return redirect()->route('my-saving.index')->with('success', 'Pembayaran Berhasil');
        } else {
            return redirect()->back()->with('error', 'Data Gagal di simpan');
        }
    }

    public function destroy($id)
    {
        $mySaving = MySaving::find($id);

        if ($mySaving && $mySaving->customer->user_id === Auth::id()) {
            $mySaving->delete();
            return redirect()->route('admin-my-saving.index')->with('success', 'Data Pembayaran Berhasil Dihapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan atau Anda tidak berhak menghapus data ini');
        }
    }
}
