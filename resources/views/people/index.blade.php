<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Selamat datang!!</h1>
    <h2>Halo nama saya {{$name}}</h2>
    @if ($grade<=70)
    <h3>gagal</h3>
    @else
    <h3>Lulus</h3>
    @endif
    @for ($x =1; $x<=10; $x++)
    {{$x}}
    @endfor
</body>
</html>
