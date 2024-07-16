<?php

namespace App\Http\Controllers;

use App\Models\MyLoan;
use Illuminate\Http\Request;

class AdminMyLoanController extends Controller
{
    public function index()
    {
        $loanApplications = MyLoan::where('repayment_status',  'unpaid')
            ->get();

        return view('admin.loans.index', compact('loanApplications'));
    }


    public function approve($id)
    {
        $loan = MyLoan::find($id);

        if (!$loan) {
            return redirect()->route('admin-my-loans.index')->with('error', 'Pengajuan pinjaman tidak ditemukan.');
        }

        $loan->status = 'approved';
        $loan->remaining_amount = $loan->amount;
        $loan->total_repayment = 0;

        if ($loan->save()) {
            return redirect()->route('admin-my-loans.index')->with('success', 'Pengajuan pinjaman disetujui.');
        } else {
            return redirect()->route('admin-my-loans.index')->with('error', 'Gagal menyetujui pengajuan pinjaman.');
        }
    }

    public function reject($id)
    {
        $loan = MyLoan::find($id);

        if (!$loan) {
            return redirect()->route('admin-my-loans.index')->with('error', 'Pengajuan pinjaman tidak ditemukan.');
        }

        $loan->status = 'rejected';
        $loan->repayment_status = 'rejected'; 

        if ($loan->save()) {
            return redirect()->route('admin-my-loans.index')->with('success', 'Pengajuan pinjaman ditolak.');
        } else {
            return redirect()->route('admin-my-loans.index')->with('error', 'Gagal menolak pengajuan pinjaman.');
        }
    }

    public function pay(Request $request, $id)
    {
        $loan = MyLoan::find($id);

        if (!$loan) {
            return redirect()->route('admin-my-loans.index')->with('error', 'Pengajuan pinjaman tidak ditemukan.');
        }

        $amount = $request->input('amount');

        if ($amount > $loan->remaining_amount) {
            return redirect()->route('admin-my-loans.index')->with('error', 'Jumlah pembayaran melebihi sisa pinjaman.');
        }

        // Proses pembayaran
        $loan->remaining_amount -= $amount;
        $loan->total_repayment += $amount;

        // Simpan ke history pembayaran
        $loan->paymentHistories()->create(['amount' => $amount]);

        if ($loan->remaining_amount <= 0) {
            $loan->repayment_status = 'paid';
        } else {
            $loan->repayment_status = 'unpaid';
        }

        if ($loan->save()) {
            return redirect()->route('admin-my-loans.index')->with('success', 'Pembayaran berhasil.');
        } else {
            return redirect()->route('admin-my-loans.index')->with('error', 'Gagal memproses pembayaran.');
        }
    }
}