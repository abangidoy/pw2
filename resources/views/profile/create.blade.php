@extends('layout.master')

@section('judul')
    Tambah Profile
@endsection

@section('content')
<form method="post" action="{{ route('profile.store') }}">
    @csrf
    <div class="form-group">
        <label>Umur</label>
        <input type="number" name="umur" value="{{ old('umur') }}" class="form-control">
    </div>

    <div class="form-group">
        <label>Bio</label>
        <textarea name="bio" class="form-control">{{ old('bio') }}</textarea>
    </div>
    
    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
    </div>

    <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Simpan</button>
</form>
@endsection