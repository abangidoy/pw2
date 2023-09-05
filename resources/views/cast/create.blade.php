@extends('layout.master')

@section('judul')
    Tambah Cast
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@section('content')
<form method="post" action="/cast">
    @csrf
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="" class="form-control">
    </div>

    @error('nama') <!-- Ubah 'Nama' menjadi 'nama' -->
    <div class="alert alert-danger">{{ $message }}</div> <!-- Perbaiki sintaks pesan error -->
    @enderror

    <div class="form-group">
        <label>Umur</label>
        <input type="number" name="umur" value="" class="form-control">
    </div>

    @error('umur') <!-- Ubah 'Umur' menjadi 'umur' -->
    <div class="alert alert-danger">{{ $message }}</div> <!-- Perbaiki sintaks pesan error -->
    @enderror

    <div class="form-group">
        <label>Bio</label>
        <textarea class="form-control" name="bio"></textarea> <!-- Perbaiki class dan penutup tag textarea -->
    </div>

    @error('bio') <!-- Ubah 'Bio' menjadi 'bio' -->
    <div class="alert alert-danger">{{ $message }}</div> <!-- Perbaiki sintaks pesan error -->
    @enderror

    <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Simpan</button>
</form>
@endsection