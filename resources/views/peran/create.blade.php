@extends('layout.master')

@section('judul')
    Tambah Peran
@endsection

@section('content')
    <form method="post" action="{{ route('peran.store') }}">
        @csrf
        <div class="form-group">
            <label>Nama Peran</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Cast ID</label>
            <select name="cast_id" class="form-control">
                @foreach ($casts as $cast)
                    <option value="{{ $cast->id }}">{{ $cast->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Film ID</label>
            <select name="film_id" class="form-control">
                @foreach ($films as $film)
                    <option value="{{ $film->id }}">{{ $film->id }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Simpan</button>
    </form>
@endsection