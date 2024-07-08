@extends('layout.main')

@section('content')
    <div class="d-flex justify-content-center align-items-center text-center pt-5 pb-5">
        <img src="/img/logo.png" alt="" style="width: 6%;">
        <h1>Kelola Nasabah</h1>
    </div>

    <div class="card-body">
        <table class="table table-hover">
            <thead style="background-color: #143855; color:white;">
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        @if ($user->is_admin == true)
                            <td><span class="badge rounded-pill bg-success">admin</span></td>
                        @else
                            <td><span class="badge rounded-pill bg-primary">user</span></td>
                        @endif
                        <td class="d-flex justify-content-center p-1">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $user->id }}">
                                <i class='bx bxs-edit' style='color:#ffffff'></i>Edit
                            </button>
                            <button type="button" class="btn btn-danger btn-sm ms-1"
                                onclick="confirmDeletion({{ $user->id }})">
                                <i class='bx bx-trash' style='color:#ffffff'></i>Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Konfirmasi Hapus -->
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

    {{-- Modal Edit Role --}}
    @foreach ($users as $user)
        <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1"
            aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center" style="background-color: #143855; color:white;">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Role</h5>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin-role.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $user->id }}">

                                    <div class="mb-2">
                                        <label for="name">Nama User</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $user->name }}" readonly>
                                    </div>
                                    <div class="mb-2">
                                        <label for="is_admin">Role User</label>
                                        <select name="is_admin" class="form-select">
                                            <option value="1" {{ $user->is_admin == true ? 'selected' : '' }}>
                                                admin</option>
                                            <option value="0" {{ $user->is_admin == false ? 'selected' : '' }}>
                                                user</option>
                                        </select>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="button" class="btn btn-danger me-2"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        function confirmDeletion(id) {
            const deleteForm = document.getElementById('deleteForm');
            deleteForm.action = `/admin-role/${id}`; // Sesuaikan URL sesuai dengan route Anda
            const confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'), {
                backdrop: 'static',
                keyboard: false
            });
            confirmDeleteModal.show();
        }
    </script>
@endsection
