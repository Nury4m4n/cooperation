<h3>SELAMAT DATANG</h3>

<h5>nama saya adalah {{$name}}</h5>

@if ($grade>= 60)
    <h3>Lulus</h3>
@else
    <h3>Tidak Lulus</h3>
@endif

@for ($i = 1; $i <= 10; $i++)
    {{$i}}
@endfor
