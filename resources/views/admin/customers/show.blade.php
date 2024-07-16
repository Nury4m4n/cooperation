@extends('layout.main')

@section('content')
    <div class="user text-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <div class="user-profil">
                        @if ($customer->image)
                            <img src="{{ asset('storage/' . $customer->image) }}" class="img-thumbnail">
                        @else
                            <img src="/img/logo.png" class="img-thumbnail">
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="user-detail">
                        <h1>{{ $customer->name }}</h1>
                        <p>
                            <i class='bx bx-id-card'></i> {{ $customer->code }}
                            <i class='bx bx-male-female' style='color:#ffffff'></i> {{ $customer->gender }}
                            <i class='bx bx-phone' style='color:#ffffff'></i> {{ $customer->phone }}
                            <i class='bx bxs-location-plus' style="color:#ffffff"></i> {{ $customer->address }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Produk Layanan Kami -->
    <div class="container">
        <div class="text-center pb-5">
            <h1>Services</h1>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <div class="col mb-4">
                <div class="card h-100">
                    <img src="/img/simpanan Wajib.jpg" class="card-img-top " alt="Gambar Simpanan Wajib"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">Simpanan Wajib</h5>
                            <p class="card-text">
                                Total: Rp {{ number_format($customer->mandatorySavings->sum('amount'), 0, ',', '.') }}
                            </p>
                        </div>
                        <div>
                            @php
                                $sortedSavings = $customer->mandatorySavings->sortByDesc('date');
                                $lastSaving = $sortedSavings->first();
                            @endphp
                            <small class="text-muted"><i class='bx bx-calendar' style='color:rgba(95,84,84,0.55)'></i>
                                Last updated
                                @if ($lastSaving)
                                    {{ $lastSaving->date }}
                                @endif
                            </small>
                            <a class="btn btn-primary btn-sm mt-2 d-block"
                                href="{{ route('admin-mandatory-saving.show', $customer->id) }}" target="blank">
                                <i class='bx bx-list-ol' style='color:#ffffff'></i> Lihat Log
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col mb-4">
                <div class="card h-100">
                    <img src="/img/tabungan.jpg" class="card-img-top" alt="Gambar Tabungan Nasabah"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">Tabungan</h5>
                            <p class="card-text">
                                Total: Rp {{ number_format($customer->mandatorySavings->sum('amount'), 0, ',', '.') }}
                            </p>
                        </div>
                        <div>
                            @php
                                $sortedSavings = $customer->mandatorySavings->sortByDesc('date');
                                $lastSaving = $sortedSavings->first();
                            @endphp
                            <small class="text-muted"><i class='bx bx-calendar' style='color:rgba(95,84,84,0.55)'></i> Last
                                updated
                                @if ($lastSaving)
                                    {{ $lastSaving->date }}
                                @endif
                            </small>
                            <a class="btn btn-primary btn-sm mt-2 d-block"
                                href="{{ route('admin-mandatory-saving.show', $customer->id) }}"target="blank">
                                <i class='bx bx-list-ol' style='color:#ffffff'></i> Lihat Log
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col mb-4">
                <div class="card h-100">
                    <img src="/img/pinjaman.jpg" class="card-img-top" alt="Gambar Pinjaman Nasabah"
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">Pinjaman</h5>
                            <p class="card-text">
                                Total: Rp {{ number_format($customer->myLoans->sum('remaining_amount'), 0, ',', '.') }}
                            </p>
                        </div>
                        <div>
                            @php
                                $sortedLoans = $customer->myLoans->sortByDesc('created_at');
                                $lastLoan = $sortedLoans->first();
                            @endphp
                            <small class="text-muted"><i class='bx bx-calendar' style='color:rgba(95,84,84,0.55)'></i>
                                Last updated
                                @if ($lastLoan)
                                    {{ $lastLoan->created_at->format('Y-m-d ') }}
                                @else
                                    N/A
                                @endif
                            </small>
                            <a class="btn btn-primary btn-sm mt-2 d-block"
                                href="{{ route('admin-my-loans.show', $customer->id) }}"target="blank">
                                <i class='bx bx-list-ol' style='color:#ffffff'></i> Lihat Log
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
