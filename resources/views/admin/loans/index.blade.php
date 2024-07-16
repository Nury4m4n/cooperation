@extends('layout.main')

@section('content')
    <div class="d-flex justify-content-center align-items-center text-center pt-5 pb-5">
        <img src="/img/logo.png" alt="Logo" style="width: 6%;">
        <h1 class="ms-3">Kelola Pengajuan Pinjaman Nasabah</h1>
    </div>

    <div class="card p-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead style="background-color: #143855;color:white;">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nasabah</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Jumlah Pinjaman</th>
                            <th>Status Pinjaman</th>
                            <th>Sisa Pinjaman</th>
                            <th>Status Pelunasan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($loanApplications as $loan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $loan->customer->name }}</td>
                                <td>{{ $loan->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>Rp {{ number_format($loan->amount, 2) }}</td>
                                <td>
                                    @if ($loan->status == 'pending')
                                        <span class="badge bg-warning text-dark">{{ ucfirst($loan->status) }}</span>
                                    @elseif ($loan->status == 'approved')
                                        <span class="badge bg-success">{{ ucfirst($loan->status) }}</span>
                                    @elseif ($loan->status == 'rejected')
                                        <span class="badge bg-danger">{{ ucfirst($loan->status) }}</span>
                                    @elseif ($loan->status == 'cancelled')
                                        <span class="badge bg-danger">{{ ucfirst($loan->status) }}</span>
                                    @endif
                                </td>
                                <td>Rp {{ number_format($loan->remaining_amount, 2) }}</td>
                                <td>
                                    @if ($loan->repayment_status == 'unpaid' && $loan->status == 'pending')
                                        <span class="badge bg-warning text-dark">pending</span>
                                    @elseif($loan->repayment_status == 'unpaid')
                                        <span class="badge bg-warning text-dark">Belum Lunas</span>
                                    @elseif ($loan->repayment_status == 'paid')
                                        <span class="badge bg-success">Lunas</span>
                                    @endif
                                </td>
                                <td class="d-flex justify-content-center">
                                    @if ($loan->status == 'pending')
                                        <button type="button" class="btn btn-success btn-sm m-1"
                                            onclick="approveLoan({{ $loan->id }})">
                                            <i class='bx bx-check-circle'></i> Setujui
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm m-1"
                                            onclick="rejectLoan({{ $loan->id }})">
                                            <i class='bx bx-x-circle'></i> Tolak
                                        </button>
                                    @elseif ($loan->status == 'approved' && $loan->repayment_status == 'unpaid')
                                        <button type="button" class="btn btn-primary btn-sm m-1"
                                            onclick="payLoan({{ $loan->id }})">
                                            <i class='bx bx-money'></i> Bayar Pinjaman
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function approveLoan(id) {
            Swal.fire({
                title: 'Konfirmasi Persetujuan',
                text: "Apakah Anda yakin ingin menyetujui pengajuan pinjaman ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Setujui!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const approveForm = document.createElement('form');
                    approveForm.action = "{{ route('admin-my-loans.approve', ':id') }}".replace(':id', id);
                    approveForm.method = 'post';
                    approveForm.innerHTML = '@csrf';
                    document.body.appendChild(approveForm);
                    approveForm.submit();
                }
            })
        }

        function rejectLoan(id) {
            Swal.fire({
                title: 'Konfirmasi Penolakan',
                text: "Apakah Anda yakin ingin menolak pengajuan pinjaman ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Tolak!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const rejectForm = document.createElement('form');
                    rejectForm.action = "{{ route('admin-my-loans.reject', ':id') }}".replace(':id', id);
                    rejectForm.method = 'post';
                    rejectForm.innerHTML = '@csrf';
                    document.body.appendChild(rejectForm);
                    rejectForm.submit();
                }
            })
        }

        function payLoan(id) {
            Swal.fire({
                title: 'Konfirmasi Pembayaran',
                html: `<form id="payForm">
                        <div class="mb-3">
                            <label for="amount" class="form-label">Jumlah Pembayaran</label>
                            <input type="number" class="form-control" name="amount" id="amount" required>
                        </div>
                    </form>`,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Bayar!',
                preConfirm: () => {
                    const amount = document.getElementById('amount').value;
                    if (!amount) {
                        Swal.showValidationMessage('Jumlah pembayaran tidak boleh kosong');
                        return false;
                    }
                    return {
                        amount: amount
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const payForm = document.createElement('form');
                    payForm.action = "{{ route('admin-my-loans.pay', ':id') }}".replace(':id', id);
                    payForm.method = 'post';
                    payForm.innerHTML = `@csrf <input type="hidden" name="amount" value="${result.value.amount}">`;
                    document.body.appendChild(payForm);
                    payForm.submit();
                }
            })
        }
    </script>
@endsection
