@extends('layout.main')

@section('content')
    <div class="user text-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <div class="user-profil">
                        @if ($customer->image)
                            <img src="/img/logo.png" class="img-thumbnail">
                        @else
                            <img src="{{ asset('storage/' . $customer->image) }}" class="img-thumbnail">
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
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 pt-2">
                <div class="card h-100">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/img/Simpanan wajib.jpg" class="img-thumbnail" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Simpanan Wajib</h5>
                                <p class="card-text">
                                    Total: Rp {{ number_format($customer->mandatorySavings->sum('amount')) }}
                                </p>
                                @php
                                    $sortedSavings = $customer->mySavings->sortByDesc('date');
                                    $lastSaving = $sortedSavings->first();
                                @endphp
                                <small class="text-muted"><i class='bx bx-calendar'
                                        style='color:rgba(95,84,84,0.55)'></i>Last updated
                                    @if ($lastSaving)
                                        {{ $lastSaving->date }}
                                    @endif
                                </small>
                                <a class="btn btn-primary btn-sm p-1 mt-2 d-block"
                                    href="{{ route('admin-mandatory-saving.show', $customer->id) }}">
                                    <i class='bx bx-list-ol' style='color:#ffffff'></i> Lihat Log
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pt-2">
                <div class="card h-100">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/img/tabungan.jpg" class="img-thumbnail" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Tabungan</h5>
                                <p class="card-text">
                                    Total: Rp {{ number_format($customer->mySavings->sum('amount')) }}
                                </p>
                                @php
                                    $sortedSavings = $customer->mySavings->sortByDesc('date');
                                    $lastSaving = $sortedSavings->first();
                                @endphp
                                <small class="text-muted"><i class='bx bx-calendar'
                                        style='color:rgba(95,84,84,0.55)'></i>Last updated
                                    @if ($lastSaving)
                                        {{ $lastSaving->date }}
                                    @endif
                                </small>
                                <a class="btn btn-primary btn-sm p-1 mt-2 d-block"
                                    href="{{ route('admin-my-saving.show', $customer->id) }}">
                                    <i class='bx bx-list-ol' style='color:#ffffff'></i> Lihat Log
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
