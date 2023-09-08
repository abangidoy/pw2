@extends('layout.master')

@section('judul')
    Tambah Kritik
@endsection

@section('content')
<form method="post" action="{{ route('kritik.store') }}">
    @csrf
    <div class="form-group">
        <label>Isi Kritik</label>
        <textarea name="content" class="form-control">{{ old('content') }}</textarea>
    </div>

    <div class="form-group">
        <label>Point</label>
        <input type="number" name="point" value="{{ old('point') }}" class="form-control">
    </div>
    <div class="form-group">
        <label>Film</label>
        <select name="film_id" class="form-control">
            @foreach ($films as $film)
                <option value="{{ $film->id }}">{{ $film->judul }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Simpan</button>
</form>
@endsection
