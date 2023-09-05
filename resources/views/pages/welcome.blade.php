@extends('layout.master')

@section('judul')
welcome
@endsection

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@isset($firstname)
    <h1>SELAMAT DATANG {{$firstname}} {{$lastname}}</h1>
@else
    <h1>SELAMAT DATANG</h1>
@endisset
    <h5>Terimakasih telah bergabung di Website kami. Media Belajar kita bersama !</h5>
</body>
</html>

@endsection