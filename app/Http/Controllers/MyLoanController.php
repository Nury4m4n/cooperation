<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\MyLoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyLoanController extends Controller
{
    public function index()
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        $myLoans = MyLoan::where('customer_id', $customer->id)->orderBy('id', 'DESC')->get();
        return view('my_loan.index', compact('customer', 'myLoans'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric',
            'loan_purpose' => 'required',
        ]);

        $customer = Customer::where('user_id', Auth::id())->first();

        $myLoan = new MyLoan();
        $myLoan->customer_id = $customer->id;
        $myLoan->amount = $request->amount;
        $myLoan->loan_purpose = $request->loan_purpose;

        if ($myLoan->save()) {
            return redirect()->route('my-loan.index')->with('success', 'Pengajuan Pinjaman berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan pengajuan pinjaman.');
        }
    }

    public function destroy($id)
    {
        $loan = MyLoan::find($id);

        if ($loan->status !== 'pending') {
            return redirect()->back()->with('error', 'Pengajuan pinjaman tidak dapat dibatalkan.');
        }
        $loan->status = 'cancelled';
        $loan->status_pelunasan = 'cancelled';
        $loan->save();

        return redirect()->back();
    }
}