    @extends('layout.main')

    @section('content')
        @if ($message = Session::get('success'))
            <div class="modal fade" id="success" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-success text-bold text-center" id="errorModalLabel">Sucsess</h5>
                        </div>
                        <div class="modal-body text-success">
                            <p>{{ $message }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', (event) => {
                    var errorModal = new bootstrap.Modal(document.getElementById('success'), {
                        backdrop: 'static',
                        keyboard: false
                    });
                    errorModal.show();
                });
            </script>
        @endif

        <div class=" d-flex justify-content-center align-items-center text-center pt-5 pb-5">
            <img src="/img/logo.png" alt="" style="width: 6%;">
            <h1>Kelola Nasabah</h1>
        </div>
        <div class="card p-2 ">
            <div class="card-header">
                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Pendaftaran
                </button>
            </div>
            <div class="card-body">
                <table class="table  table-hover">
                    <thead style="background-color: #143855;color:white;">
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
                                    <a href="{{ route('customer.show', $customer->id) }}"
                                        class="btn btn-info btn-sm m-1 ">Lihat</a>
                                    <a href="{{ route('customer.edit', $customer->id) }}"
                                        class="btn btn-warning btn-sm m-1">Edit</a>

                                    <form action="{{ route('customer.destroy', $customer->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm m-1">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if (count($errors) > 0)
                <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="errorModalLabel"><i data-feather="x"></i>Eror</h5>

                            </div>
                            <div class="modal-body text-danger">
                                <ul>
                                    @foreach ($errors->all() as $eror)
                                        <li>{{ $eror }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Script to show the modal -->
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'), {
                    backdrop: 'static',
                    keyboard: false
                });
                errorModal.show();
            });
        </script>
        @endif


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"
                        style="background-color: #143855;color:white;>
                        <h5 class="modal-title"
                        id="exampleModalLabel"> Pendaftaran Nasabah</h5>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('customer.store') }}" method="post">
                                    @csrf
                                    <div class="mb-2">
                                        <label for="code">Kode Nasabah</label>
                                        <input type="text" name="code" id="code"
                                            class="form-control"placeholder="A204">
                                    </div>
                                    <div class="mb-2">
                                        <label for="name">Nama Nasabah</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Nuryaman">
                                    </div>
                                    <div class="mb-2">
                                        <label for="phone">Phone Nasabah</label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            placeholder="0857xxxxx">
                                    </div>
                                    <div class="mb-2">
                                        <label for="address">Address Nasabah</label>
                                        <textarea name="address" id="address" cols="30" rows="10" class="form-control" placeholder="Bandung"></textarea>
                                    </div>
                                    <div class="mb-2">
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success float-end">Kirim</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
