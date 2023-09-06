@extends('layout.master')

@php
    use Illuminate\Support\Facades\Auth;
@endphp

@php
    use App\Models\Login;
@endphp

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
@php
    $user = Auth::user();
@endphp

@if ($user)
    <h1>SELAMAT DATANG {{ $user->namadepan }} {{ $user->namabelakang }}</h1>
@else
    <h1>SELAMAT DATANG</h1>
@endif

<h5>Terimakasih telah bergabung di Website kami. Media Belajar kita bersama !</h5>
</body>
</html>
@endsection
