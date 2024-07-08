<?php

namespace App\Http\Controllers;

use App\Models\MyLoan;
use Illuminate\Http\Request;

class AdminMyLoanController extends Controller
{
    public function index()
    {
        $loanApplications = MyLoan::where('status', 'pending')->get();
        return view('admin.loans.index', compact('loanApplications'));
    }

    public function approve($id)
    {
        $loan = MyLoan::find($id);

        if (!$loan) {
            return redirect()->route('admin-my-loans.index')->with('error', 'Pengajuan pinjaman tidak ditemukan.');
        }

        $loan->status = 'approved';
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
        if ($loan->save()) {
            return redirect()->route('admin-my-loans.index')->with('success', 'Pengajuan pinjaman ditolak.');
        } else {
            return redirect()->route('admin-my-loans.index')->with('error', 'Gagal menolak pengajuan pinjaman.');
        }
    }
}
