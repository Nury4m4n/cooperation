@extends('layout.main')

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <p>ERROR!!!</p>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </div>
    @endif
    <div class=" d-flex justify-content-center align-items-center text-center pt-5 pb-5">
        <img src="/img/logo.png" alt="" style="width: 6%;">
        <h1>Edit Nasabah</h1>
    </div>
    <div class="card">
        <div class="card-header " style="background-color: #143855;color:white;">
            Kode Nasabah : #{{ $customer->code }}
        </div>
        <div class="card-body">
            <form action="{{ route('customer.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $customer->id }}">

                <div class="mb-3">
                    <input type="text" name="name" placeholder="Nama Pelanggan" class="form-control"
                        value="{{ $customer->name }}">
                </div>
                <div class="mb-3">
                    <input type="text" name="phone" placeholder="08xxxxxx" class="form-control"
                        value="{{ $customer->phone }}">
                </div>
                <div class="mb-3">
                    <textarea name="address" cols="30" rows="3" placeholder="Alamat Pelanggan" class="form-control">{{ $customer->address }}</textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Simpan" class="btn btn-success">
                    <a href="{{ route('customer.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
