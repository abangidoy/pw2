@extends('layout.master')

@section('judul')
    Tambah Genre
@endsection

@section('content')
<form method="post" action="/genre">
    @csrf
    <div class="form-group">
        <label>Nama Genre</label>
        <input type="text" name="nama" value="{{ old('nama') }}" class="form-control">
    </div>

    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Simpan</button>
</form>
@endsection