@extends('layout.main')

@section('content')
    <div class=" d-flex justify-content-center align-items-center text-center pt-5 pb-5">
        <img src="/img/logo.png" alt="" style="width: 6%;">
        <h1>Data Nasabah</h1>
    </div>
    <div class="card">
        <h5 class="card-header " style="background-color: #143855;color:white;">Kode Nasabah : #{{ $customer->code }}</h5>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Nama Pelanggan</th>
                    <td>: {{ $customer->name }}</td>
                </tr>
                <tr>
                    <th>Telepon Pelanggan</th>
                    <td>: {{ $customer->phone }}</td>
                </tr>
                <tr>
                    <th>Alamat Pelanggan</th>
                    <td>: {{ $customer->address }}</td>
                </tr>
            </table>
            <div class="mb-2">
                <h1>Riwayat Pembayaran Simpanan Wajib</h1>
                <table class="table table-hover table-stripped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer->mandatorySavings as $ms)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ms->date }}</td>
                                <td>{{ $ms->amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('customer.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection
