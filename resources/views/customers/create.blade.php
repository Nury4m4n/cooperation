@extends('layout.main')
@section('content')

    @if (count($errors) > 0)
        <!-- Modal -->
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

    <div class="card">
        <div class="card-header">
            Pendaftaran Nasabah
        </div>
        <div class="card-body">
            <form action="{{ route('customer.store') }}" method="post">
                @csrf
                <div class="mb-2">
                    <label for="code">Kode Nasabah</label>
                    <input type="text" name="code" id="code" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="name">Nama Nasabah</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="phone">Phone Nasabah</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="address">Address Nasabah</label>
                    <textarea name="address" id="address" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="mb-2">
                    <button type="submit" class="btn btn-success float-end">Kirim</button>
                </div>
            </form>
        </div>
    </div>

@endsection
