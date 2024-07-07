@extends('layout.main')

@section('content')
    <div class="user text-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2">
                    <div class="user-profil">
                        <img src="/img/hero.jpg" class="img-thumbnail">
                    </div>
                </div>
                <div class="col-6">
                    <div class="user-detail">
                        @if ($customers->count() > 0)
                            @foreach ($customers as $customer)
                                <h1>{{ $customer->name }}</h1>
                                <p>
                                    <i class='bx bx-id-card'></i> {{ $customer->code }}
                                    <i class='bx bx-male-female' style='color:#ffffff'></i> {{ $customer->gender }}
                                    <i class='bx bx-phone' style='color:#ffffff'></i> {{ $customer->phone }}
                                    <i class='bx bxs-location-plus' style="color:#ffffff"></i> {{ $customer->address }}
                                </p>
                            @endforeach
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $customer->id }}">
                                <i class='bx bxs-edit' style='color:#ffffff'></i>Edit
                            </button>
                        @else
                            <p>Lengkapi Data</p>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                <i class='bx bxs-edit' style='color:#ffffff'></i>Edit
                            </button>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-6 pt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="/img/Simpanan-Wajib.jpg" class="img-thumbnail" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Simpanan Wajib</h5>
                                    @if ($mandatorySavings->sum('amount') > 0)
                                        <p class="card-text">
                                            Total :Rp
                                            {{ number_format($mandatorySavings->sum('amount'), 2, ',', '.') }}
                                        </p>
                                        @php
                                            $sortedSavings = $mandatorySavings->sortByDesc('date');
                                            $lastSaving = $sortedSavings->first();
                                        @endphp
                                        <small class="text-muted">Last updated
                                            @if ($lastSaving)
                                                {{ $lastSaving->date }}
                                            @endif
                                        </small>
                                    @else
                                        <p>Belum ada pemasukan</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 pt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="/img/Simpanan-Wajib.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Tabungan </h5>
                                    @if ($mySavings->sum('amount') > 0)
                                        <p class="card-text">
                                            Total :Rp
                                            {{ number_format($mySavings->sum('amount'), 2, ',', '.') }}
                                        </p>
                                        @php
                                            $sortedSavings = $mySavings->sortByDesc('date');
                                            $lastSaving = $sortedSavings->first();
                                        @endphp
                                        <small class="text-muted">Last updated
                                            @if ($lastSaving)
                                                {{ $lastSaving->date }}
                                            @endif
                                        </small>
                                    @else
                                        <p>Belum ada pemasukan</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center" style="background-color: #143855; color:white;">
                    <h5 class="modal-title" id="staticBackdropLabel">Pendaftaran Nasabah</h5>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('customer.store') }}" method="post">
                                @csrf
                                <div class="mb-2" hidden>
                                    <input type="number" name="user_id" value="{{ auth()->user()->id }}" readonly>
                                </div>
                                <div class="mb-2" hidden>
                                    <label for="name">Kode Nasabah</label>
                                    <input type="code" name="code" id="code" class="form-control"
                                        value="{{ $nextCode }}" readonly>
                                </div>
                                <div class="mb-2">
                                    <label for="name">Nama Nasabah</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Nuryaman">
                                </div>
                                <div class="mb-2">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select name="gender" class="form-select">
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="perempuan">perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="phone">Phone Nasabah</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="0857xxxxx">
                                </div>
                                <div class="mb-2">
                                    <label for="address">Address Nasabah</label>
                                    <textarea name="address" id="address" cols="30" rows="5" class="form-control" placeholder="Bandung"></textarea>
                                </div>
                                <div class="mb-2">
                                    <div class="card-footer float-end">
                                        <a href="{{ route('customer.index') }}" class="btn btn-danger">Batal</a>
                                        <button type="submit" class="btn btn-success">Kirim</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Cusstomer --}}
    @foreach ($customers as $customer)
        <div class="modal fade" id="editModal{{ $customer->id }}" tabindex="-1"
            aria-labelledby="editModalLabel{{ $customer->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center" style="background-color: #143855; color:white;">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Nasabah</h5>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('customer.update', ['customer' => $customer->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $customer->id }}">

                                    <div class="mb-2">
                                        <label for="name">Nama Nasabah</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Nuryaman">
                                    </div>
                                    <div class="mb-2">
                                        <label for="gender">Jenis Kelamin</label>
                                        <select name="gender" class="form-select">
                                            <option value="Laki-Laki"
                                                {{ $customer->gender == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                            <option value="Perempuan"
                                                {{ $customer->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label for="phone">Phone Nasabah</label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            value="{{ $customer->phone }}">
                                    </div>
                                    <div class="mb-2">
                                        <label for="address">Alamat Nasabah</label>
                                        <textarea name="address" id="address" cols="30" rows="5" class="form-control">{{ $customer->address }}</textarea>
                                    </div>
                                    <div class="mb-2">
                                        <div class="card-footer float-end">
                                            <a href="{{ route('customer.index') }}" class="btn btn-danger">Batal</a>
                                            <button type="submit" class="btn btn-success">Kirim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
