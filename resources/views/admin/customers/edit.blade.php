@extends('layout.main')

@section('content')
    <div class="d-flex justify-content-center align-items-center text-center pt-5 pb-5">
        <img src="/img/logo.png" alt="" style="width: 6%;">
        <h1 class="ms-3">Edit Nasabah</h1>
    </div>

    <div class="card">
        <div class="card-header" style="background-color: #143855; color: white;">
            Kode Nasabah: #{{ $customer->code }}
        </div>
        <div class="card-body">
            <form action="{{ route('admin-customer.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $customer->id }}">

                <div class="mb-3">
                    <label for="code" class="form-label">Kode</label>
                    <input type="number" name="code" id="code" placeholder="Masukkan Kode" class="form-control"
                        value="{{ $customer->code }}">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Pelanggan</label>
                    <input type="text" name="name" id="name" placeholder="Masukkan Nama Pelanggan"
                        class="form-control" value="{{ $customer->name }}">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <input type="text" name="phone" id="phone" placeholder="Masukkan Nomor Telepon"
                        class="form-control" value="{{ $customer->phone }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat Pelanggan</label>
                    <textarea name="address" id="address" cols="30" rows="3" placeholder="Masukkan Alamat Pelanggan"
                        class="form-control">{{ $customer->address }}</textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('admin-customer.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
