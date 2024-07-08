@extends('layout.main')

@section('content')
    <div class="d-flex justify-content-center align-items-center text-center pt-5 pb-5">
        <img src="/img/logo.png" alt="" style="width: 6%;">
        <h1 class="ms-3">Tabungan Nasabah</h1>
    </div>

    <div class="card p-2">
        <div class="card-header">
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Pengajuan Pinjaman
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead style="background-color: #143855;color:white;">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Jumlah Pinjaman</th>
                            <th>Status Pinjaman</th>
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
                                        <span class="badge bg-warning text-dark">{{ $loan->status }}</span>
                                    @elseif ($loan->status == 'approved')
                                        <span class="badge bg-success">{{ $loan->status }}</span>
                                    @elseif ($loan->status == 'rejected')
                                        <span class="badge bg-danger">{{ $loan->status }}</span>
                                    @elseif ($loan->status == 'cancelled')
                                        <span class="badge bg-danger">{{ $loan->status }}</span>
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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #143855; color:white;">
                    <h5 class="modal-title" id="staticBackdropLabel">Form Pengajuan Pinjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('my-loan.store') }}" method="post">
                                @csrf
                                <div class="mb-3" hidden>
                                    <input type="number" name="customer_id" id="customer_id" class="form-control"
                                        value="{{ $customer->id }}" readonly>
                                </div>
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
                                <div class="mb-3">
                                    <div class="card-footer float-end">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success">Ajukan Pinjaman</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Batal -->
    <div class="modal fade" id="confirmCancelModal" tabindex="-1" aria-labelledby="confirmCancelModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="confirmCancelModalLabel">Konfirmasi Pembatalan Pengajuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin membatalkan pengajuan pinjaman ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                    <form id="cancelForm" action="{{ route('my-loan.destroy', ':id') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function cancelLoan(id) {
            const cancelForm = document.getElementById('cancelForm');
            cancelForm.action = cancelForm.action.replace(':id', id); // Mengganti placeholder ':id' dengan id yang sesuai
            const confirmCancelModal = new bootstrap.Modal(document.getElementById('confirmCancelModal'), {
                backdrop: 'static',
                keyboard: false
            });
            confirmCancelModal.show();
        }
    </script>
@endsection
