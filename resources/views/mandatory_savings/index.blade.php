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
                                <th>Tanggal Bayar</th>
                                <th>Kode Nasabah</th>
                                <th>Nama Nasabah</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($mandatorySavings as $ms)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ms->date }}</td>
                                    <td>{{ $ms->customer->code }}</td>
                                    <td>{{ $ms->Customer->name }}</td>
                                    <td>{{ $ms->sum('amount') }}</td>
                                    <td>
                                        <a href="{{ route('mandatory-saving.edit', $ms->id) }}"
                                            class="btn btn-warning btn-sm m-1">Edit</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if (count($errors) > 0)
                    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-danger" id="errorModalLabel"><i data-feather="x"></i>Eror
                                    </h5>

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
                            id="exampleModalLabel"> Pembayaran Simpanan Nasabah</h5>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('mandatory-saving.store') }}" method="post">
                                        @csrf
                                        <div class="mb-2">
                                            <label for="customer_id">Pilih Nasabah</label>
                                            <select name="customer_id" class="form-select">
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">
                                                        {{ $customer->code . '-' . $customer->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="amount">Jumlah</label>
                                            <input type="text" name="amount" id="phone" class="form-control"
                                                value="1000000" readonly>
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
