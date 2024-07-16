@extends('layout.main')

@section('content')
    <div class="d-flex justify-content-center align-items-center text-center pt-5 pb-5">
        <img src="/img/logo.png" alt="Logo" style="width: 6%;">
        <h1 class="ms-3">Pengajuan Pinjaman</h1>
    </div>

    <div class="card p-2">
        <div class="card-header">
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#loanModal">
                Pengajuan Pinjaman
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead style="background-color: #143855; color:white;">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Jumlah Pinjaman</th>
                            <th>Status Pinjaman</th>
                            <th>Pembayaran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($myLoans as $loan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $loan->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>Rp {{ number_format($loan->amount) }}</td>
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
                                    @elseif ($loan->repayment_status == 'cancelled')
                                        <span class="badge bg-danger">cancelled</span>
                                    @endif
                                </td>
                                <td class="d-flex justify-content-center">
                                    @if ($loan->status == 'cancelled')
                                        <button type="button" class="btn btn-secondary btn-sm m-1" disabled>
                                            <i class='bx bx-x-circle'></i> Batal
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-secondary btn-sm m-1"
                                            onclick="cancelLoan({{ $loan->id }})">
                                            <i class='bx bx-x-circle'></i> Batal
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

    <!-- Modal -->
    <div class="modal fade" id="loanModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="loanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #143855; color:white;">
                    <h5 class="modal-title" id="loanModalLabel">Form Pengajuan Pinjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('my-loan.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                        <div class="mb-3">
                            <label for="amount" class="form-label">Jumlah Pinjaman (Rp)</label>
                            <input type="number" name="amount" id="amount" class="form-control"
                                placeholder="Masukkan jumlah pinjaman" required>
                        </div>
                        <div class="mb-3">
                            <label for="loan_purpose" class="form-label">Tujuan Pinjaman</label>
                            <textarea name="loan_purpose" id="loan_purpose" cols="30" rows="5" class="form-control"
                                placeholder="Jelaskan tujuan penggunaan pinjaman"></textarea>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Ajukan Pinjaman</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert script -->
    <script>
        function cancelLoan(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success me-2',
                    cancelButton: 'btn btn-danger me-2'
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: 'Konfirmasi Pembatalan',
                text: 'Apakah Anda yakin ingin membatalkan pengajuan pinjaman ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, batalkan!',
                cancelButtonText: 'Tidak, tetap ajukan',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `{{ route('my-loan.destroy', '') }}/${id}`;
                    form.innerHTML = `
                        @csrf
                        @method('DELETE')
                    `;
                    document.body.appendChild(form);
                    form.submit();
                    swalWithBootstrapButtons.fire(
                        'Dibatalkan!',
                        'Pengajuan pinjaman Anda telah dibatalkan.',
                        'success'
                    );
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        'Dibatalkan',
                        'Pengajuan pinjaman Anda tetap diajukan :)',
                        'error'
                    );
                }
            });
        }
    </script>
@endsection
