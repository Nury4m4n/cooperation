@extends('layout.main')

@section('content')
    <div class="d-flex justify-content-center align-items-center text-center pt-5 pb-5">
        <img src="/img/logo.png" alt="" style="width: 6%;">
        <h1>Kelola Nasabah</h1>
    </div>

    <div class="card p-2">
        <div class="card-body">
            <table class="table table-hover">
                <thead style="background-color: #143855; color:white;">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $customer->code }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('admin-customer.show', $customer->id) }}"
                                    class="btn btn-warning btn-sm m-1"><i class='bx bx-show-alt'></i>Lihat</a>
                                <a href="{{ route('admin-customer.edit', $customer->id) }}"
                                    class="btn btn-primary btn-sm m-1 text-light"><i class='bx bxs-edit'
                                        style='color:#fdfdfd'></i>Edit</a>
                                <button type="button" class="btn btn-danger btn-sm m-1"
                                    onclick="confirmDeletion({{ $customer->id }})">
                                    <i class='bx bx-trash'></i>Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center" style="background-color: #143855; color:white;">
                        <h5 class="modal-title" id="staticBackdropLabel">Pendaftaran Nasabah</h5>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin-customer.store') }}" method="post">
                                    @csrf
                                    <div class="mb-2">
                                        <label for="code">Kode Nasabah</label>
                                        <input type="text" name="code" id="code" class="form-control"
                                            placeholder="A204">
                                    </div>
                                    <div class="mb-2">
                                        <label for="name">Nama Nasabah</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Nuryaman">
                                    </div>
                                    <div class="mb-2">
                                        <label for="gender">Jenis Kelamin</label>
                                        <select name="gender" class="form-select">
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="perempuan">perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label for="phone">Phone Nasabah</label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            placeholder="0857xxxxx">
                                    </div>
                                    <div class="mb-2">
                                        <label for="address">Address Nasabah</label>
                                        <textarea name="address" id="address" cols="30" rows="5" class="form-control" placeholder="Bandung"></textarea>
                                    </div>
                                    <div class="mb-2">
                                        <div class="card-footer float-end">
                                            <a href="{{ route('admin-customer.index') }}" class="btn btn-danger">Batal</a>
                                            <button type="submit" class="btn btn-success">Kirim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="confirmDeleteModalLabel">Konfirmasi Hapus</h5>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                    <form id="deleteForm" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-success">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDeletion(id) {
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = `/admin-customer/${id}`; // Sesuaikan URL sesuai dengan route Anda
            const confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'), {
                backdrop: 'static',
                keyboard: false
            });
            confirmDeleteModal.show();
        }
    </script>
@endsection
