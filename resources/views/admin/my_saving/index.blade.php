@extends('layout.main')

@section('content')
    <div class="d-flex justify-content-center align-items-center text-center pt-5 pb-5">
        <img src="/img/logo.png" alt="" style="width: 6%;">
        <h1 class="ms-3">Tabungan Nasabah</h1>
    </div>

    <div class="card p-2">
        <div class="card-header">
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Tabungan Nasabah
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead style="background-color: #143855; color:white;">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Tanggal Bayar</th>
                            <th>Kode Nasabah</th>
                            <th>Nama Nasabah</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($mySavings as $ms)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ms->date }}</td>
                                <td>{{ $ms->customer->code }}</td>
                                <td>{{ $ms->customer->name }}</td>
                                <td>Rp {{ number_format($ms->amount) }}</td>
                                <td class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-danger btn-sm m-1"
                                        onclick="confirmDeletion({{ $ms->id }})">
                                        <i class='bx bx-trash'></i>Hapus
                                    </button>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Tabungan Nasabah</h5>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin-my-saving.store') }}" method="post">
                                @csrf
                                <div class="mb-2">
                                    <label for="customer_id">Pilih Nasabah</label>
                                    <select name="customer_id" class="form-select">
                                        @foreach ($customers as $c)
                                            <option value="{{ $c->id }}">{{ $c->code . ' - ' . $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="amount">Jumlah</label>
                                    <input type="text" name="amount" id="amount" class="form-control" value="10000">
                                </div>
                        </div>
                        <div class="mb-2">
                            <div class="card-footer float-end">
                                <a href="{{ route('admin-my-saving.index') }}" class="btn btn-danger">Batal</a>
                                <button type="submit" class="btn btn-success">Kirim</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDeletion(id) {
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: "Apakah Anda yakin ingin menghapus data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const deleteForm = document.createElement('form');
                    deleteForm.action = `/admin-my-saving/${id}`;
                    deleteForm.method = 'post';
                    deleteForm.innerHTML = '@csrf @method('DELETE')';
                    document.body.appendChild(deleteForm);
                    deleteForm.submit();
                }
            });
        }
    </script>
@endsection
