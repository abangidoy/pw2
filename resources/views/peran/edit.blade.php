@extends('layout.master')

@section('judul')
    Edit Peran
@endsection

@section('content')
    <form method="post" action="{{ route('peran.update', $peran->id) }}" id="edit-peran-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Peran</label>
            <input type="text" name="nama" value="{{ $peran->nama }}" class="form-control">
        </div>

        <div class="form-group">
            <label>Cast</label>
            <select name="cast_id" class="form-control">
                @foreach ($casts as $cast)
                    <option value="{{ $cast->id }}" @if ($cast->id == $peran->cast_id) selected @endif>{{ $cast->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Film</label>
            <select name="film_id" class="form-control">
                @foreach ($films as $film)
                    <option value="{{ $film->id }}" @if ($film->id == $peran->film_id) selected @endif>{{ $film->judul }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Simpan</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.querySelector('#edit-peran-form').addEventListener('submit', function (event) {
        event.preventDefault();
        Swal.fire({
            title: "Konfirmasi",
            text: "Apakah Anda ingin menyimpan perubahan?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#FFCC00",
            cancelButtonColor: "#FFCC00",
            confirmButtonText: "Ya",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
</script>
@endsection
