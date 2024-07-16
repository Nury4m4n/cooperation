@extends('layout.main')

@section('content')
    <div class="d-flex justify-content-center align-items-center text-center pt-5 pb-5">
        <img src="/img/logo.png" alt="Logo" style="width: 6%;">
        <h1 class="ms-3">Log Pinjaman</h1>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Log Pinjaman</h5>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Jumlah Pinjaman</th>
                            <th>Status Pinjaman</th>
                            <th>Pembayaran</th>
                            <th>Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($customer->myLoans as $loan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $loan->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>Rp {{ number_format($loan->amount, 0, ',', '.') }}</td>
                                <td>
                                    @if ($loan->status == 'pending')
                                        <span class="badge bg-warning text-dark">{{ ucfirst($loan->status) }}</span>
                                    @elseif ($loan->status == 'approved')
                                        <span class="badge bg-success">{{ ucfirst($loan->status) }}</span>
                                    @elseif ($loan->status == 'rejected' || $loan->status == 'cancelled')
                                        <span class="badge bg-danger">{{ ucfirst($loan->status) }}</span>
                                    @endif
                                </td>
                                <td>Rp {{ number_format($loan->remaining_amount, 0, ',', '.') }}</td>
                                <td>
                                    @if ($loan->repayment_status == 'unpaid')
                                        <span class="badge bg-warning text-dark">
                                            {{ $loan->status == 'pending' ? 'Pending' : 'Belum Lunas' }}
                                        </span>
                                    @elseif ($loan->repayment_status == 'paid')
                                        <span class="badge bg-success">Lunas</span>
                                    @elseif ($loan->repayment_status == 'cancelled')
                                        <span class="badge bg-danger">Cancelled</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
