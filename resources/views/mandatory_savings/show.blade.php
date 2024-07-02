@extends('layout.main')

@section('content')
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
                @foreach ($customer->mandatorysavings as $ms)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ms->date }}</td>
                        <td>{{ $ms->code }}</td>
                        <td>{{ $ms->name }}</td>
                        <td>{{ $ms->amount }}</td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection

@endsection
