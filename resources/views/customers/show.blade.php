@extends('layout.main')

@section('content')
    <div class=" d-flex justify-content-center align-items-center text-center pt-5 pb-5">
        <img src="/img/logo.png" alt="" style="width: 6%;">
        <h1>Data Nasabah</h1>
    </div>
    <div class="card">
        <h5 class="card-header " style="background-color: #143855;color:white;">Kode Nasabah : #{{ $customers->code }}</h5>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Nama Pelanggan</th>
                    <td>: {{ $customers->name }}</td>
                </tr>
                <tr>
                    <th>Telepon Pelanggan</th>
                    <td>: {{ $customers->phone }}</td>
                </tr>
                <tr>
                    <th>Alamat Pelanggan</th>
                    <td>: {{ $customers->address }}</td>
                </tr>
            </table>
            <a href="{{ route('customer.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection
