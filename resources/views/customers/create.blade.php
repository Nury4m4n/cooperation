@extends('layout.main')

@section('content')
    @if (count($errors) > 0)
        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="errorModalLabel"><i data-feather="x"></i>Eror</h5>
                    </div>
                    <div class="modal-body text-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

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

    <div class="d-flex justify-content-center align-items-center text-center pt-5 pb-5">
        <img src="/img/logo.png" alt="" style="width: 6%;">
        <h1>Pendaftaran Nasabah</h1>
    </div>
    <div class="card">
        <div class="card-header" style="background-color: #143855; color:white;">
            Data Nasabah
        </div>
        <div class="card-body">
            <form action="{{ route('customer.store') }}" method="post">
                @csrf
                <div class="mb-2">
                    <label for="code">Kode Nasabah</label>
                    <input type="text" name="code" id="code" class="form-control" placeholder="A204">
                </div>
                <div class="mb-2">
                    <label for="name">Nama Nasabah</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nuryaman">
                </div>
                <div class="mb-2">
                    <label for="phone">Phone Nasabah</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="0857xxxxx">
                </div>
                <div class="mb-2">
                    <label for="address">Address Nasabah</label>
                    <textarea name="address" id="address" cols="30" rows="5" class="form-control" placeholder="Bandung"></textarea>
                </div>
                <div class="mb-2">
                    <div class="card-footer float-end ">
                        <a href="{{ route('customer.index') }}" class="btn btn-danger">Batal</a>
                        <button type="submit" class="btn btn-success ">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
