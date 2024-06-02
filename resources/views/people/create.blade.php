@extends('layouts.main')
@section('Pendaftaran')
    <h1>form pendaftaran</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </div>
    @endif
    <form action="{{ route('person.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="">Nama</label>
            <input type="text" name="name" placeholder="inputkan nama anda">
        </div>

        <div class="mb-3">
            <input type="submit" value="simpan" class="btn btn-success">
        </div>
    </form>
@endsection
