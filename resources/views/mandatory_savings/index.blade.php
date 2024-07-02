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
        <h1> Simpanan Wajib</h1>
    </div>
    <div class="card p-2 ">
        <div class="card-header">
            <a href="{{ route('mandatory-saving.create') }}" class="btn btn-primary float-end"> Pendaftaran</a>
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
                            <td>{{ $ms->amount }}</td>
                            <td class="d-flex justify-content-center">
                                {{-- <a href="{{ route('mandatory-saving.show', $ms->id) }}"
                                    class="btn btn-info btn-sm m-1 ">Lihat</a> --}}
                                <form action="{{ route('mandatory-saving.destroy', $ms->id) }}" method="post">
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
    </div>
@endsection
