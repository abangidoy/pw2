@extends('layout.master')

@section('judul')
    Tambah Film
@endsection

@section('content')
    <form method="post" action="{{ route('film.store') }}">
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Ringkasan</label>
            <textarea name="ringkasan" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label>Tahun</label>
            <input type="text" name="tahun" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Poster</label>
            <input type="text" name="poster" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Genre</label>
            <select name="genre_id" class="form-control" required>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Simpan</button>
    </form>
@endsection