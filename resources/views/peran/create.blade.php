@extends('layout.master')

@section('judul')
    Tambah Peran
@endsection

@section('content')
<form method="post" action="{{ route('peran.store') }}">
    @csrf
    <div class="form-group">
        <label>Film</label>
        <select name="film_id" class="form-control">
            <option disabled selected>Pilih Film</option>
            @foreach ($films as $film)
                <option value="{{ $film->id }}">{{ $film->judul }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Cast</label>
        <select name="cast_id" class="form-control">
            <option disabled selected>Pilih Cast</option>
            @foreach ($casts as $cast)
                <option value="{{ $cast->id }}">{{ $cast->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ old('nama') }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Simpan</button>
</form>
@endsection
