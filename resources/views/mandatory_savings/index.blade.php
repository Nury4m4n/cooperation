@extends('layout.main')

@section('content')
    <div class="d-flex justify-content-center align-items-center text-center pt-5 pb-5">
        <img src="/img/logo.png" alt="Logo" style="width: 6%;">
        <h1>Simpanan Wajib</h1>
    </div>

    <div class="card p-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead style="background-color: #143855;color:white;">
                        <tr class="text-center">
                            <th>Tanggal Bayar</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($mandatorySavings as $ms)
                            <tr>
                                <td>{{ $ms->date }}</td>
                                <td>Rp {{ number_format($ms->amount, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
