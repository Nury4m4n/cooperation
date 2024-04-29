@extends('layouts.main')
@section('pendaftaran')
<div class="container">
<h1>Form Pendaftaran</h1>
@if (count($errors)>0){
    <div class="alert alert-danger">
        @foreach ($errors->all() as $item)
        <li>{{$item}}</li>
        @endforeach
    </div>
}

@endif
<form action="{{route('person.store')}}" method="post">
    @csrf
        <div class="mb-3">
            <label for="" class="mb-2">Nama</label>
            <input type="text" name="name" placeholder="Inpukan Nama Anda" class="form-control">
        </div>
        <div class="mb-3">
            <input type="submit" value="Simpan" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection
