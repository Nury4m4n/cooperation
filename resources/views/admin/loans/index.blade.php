@extends('layout.main')

@section('content')
    <div class="d-flex justify-content-center align-items-center text-center pt-5 pb-5">
        <img src="/img/logo.png" alt="" style="width: 6%;">
        <h1 class="ms-3">Tabungan Nasabah</h1>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($loanApplications as $loan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $loan->customer->name }}</td>
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
                                    @if ($loan->status == 'pending')
                                        <button type="button" class="btn btn-success btn-sm m-1"
                                            onclick="approveLoan({{ $loan->id }})">
                                            <i class='bx bx-check-circle'></i> Setujui
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm m-1"
                                            onclick="rejectLoan({{ $loan->id }})">
                                            <i class='bx bx-x-circle'></i> Tolak
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

    <!-- Modal Konfirmasi Setujui -->
    <div class="modal fade" id="confirmApproveModal" tabindex="-1" aria-labelledby="confirmApproveModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="confirmApproveModalLabel">Konfirmasi Persetujuan Pinjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menyetujui pengajuan pinjaman ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                    <form id="approveForm" action="{{ route('admin-my-loans.approve', ':id') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Tolak -->
    <div class="modal fade" id="confirmRejectModal" tabindex="-1" aria-labelledby="confirmRejectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="confirmRejectModalLabel">Konfirmasi Penolakan Pinjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menolak pengajuan pinjaman ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <form id="rejectForm" action="{{ route('admin-my-loans.reject', ':id') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function approveLoan(id) {
            const approveForm = document.getElementById('approveForm');
            approveForm.action = approveForm.action.replace(':id', id); // Mengganti placeholder ':id' dengan id yang sesuai
            const confirmApproveModal = new bootstrap.Modal(document.getElementById('confirmApproveModal'), {
                backdrop: 'static',
                keyboard: false
            });
            confirmApproveModal.show();
        }

        function rejectLoan(id) {
            const rejectForm = document.getElementById('rejectForm');
            rejectForm.action = rejectForm.action.replace(':id', id); // Mengganti placeholder ':id' dengan id yang sesuai
            const confirmRejectModal = new bootstrap.Modal(document.getElementById('confirmRejectModal'), {
                backdrop: 'static',
                keyboard: false
            });
            confirmRejectModal.show();
        }
    </script>
@endsection
