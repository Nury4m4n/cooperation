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
            <form action="{{ route('mandatory-saving.store') }}" method="post">
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
                    <input type="text" name="amount" id="phone" class="form-control" value="1000000" readonly>
                </div>
        </div>
        <div class="mb-2">
            <div class="card-footer float-end ">
                <a href="{{ route('mandatory-saving.index') }}" class="btn btn-danger">Batal</a>
                <button type="submit" class="btn btn-success ">Kirim</button>
            </div>
        </div>
        </form>
    </div>
@endsection
