@extends('layout.master')

@section('content')
    <h2>Tambah Film</h2>

    <form action="{{ route('film.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>

        <div class="form-group">
            <label for="ringkasan">Ringkasan</label>
            <textarea class="form-control" id="ringkasan" name="ringkasan" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="tahun" required>
        </div>

        <div class="form-group">
            <label for="poster">Poster</label>
            <input type="text" class="form-control" id="poster" name="poster" required>
        </div>

        <div class="form-group">
            <label for="genre_id">Genre ID</label>
            <input type="number" class="form-control" id="genre_id" name="genre_id" required>
        </div>

        <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Simpan</button>
    </form>
@endsection
