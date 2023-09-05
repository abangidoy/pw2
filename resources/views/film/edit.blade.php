@extends('layout.master')

@section('content')
    <h2>Edit Film</h2>

    <form action="{{ route('film.update', ['film' => $film->id]) }}" method="POST" id="update-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $film->judul }}" required>
        </div>

        <div class="form-group">
            <label for="ringkasan">Ringkasan</label>
            <textarea class="form-control" id="ringkasan" name="ringkasan" rows="3" required>{{ $film->ringkasan }}</textarea>
        </div>

        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $film->tahun }}" required>
        </div>

        <div class="form-group">
            <label for="poster">Poster URL</label>
            <input type="text" class="form-control" id="poster" name="poster" value="{{ $film->poster }}" required>
        </div>

        <div class="form-group">
            <label for="genre_id">Genre ID</label>
            <input type="number" class="form-control" id="genre_id" name="genre_id" value="{{ $film->genre_id }}" required>
        </div>

        <button type="button" class="btn btn-warning" id="btn-update"><i class="bi bi-pencil-square"></i> Simpan</button>
    </form>
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('btn-update').addEventListener('click', function () {
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
                document.getElementById('update-form').submit();
            }
        });
    });
</script>
<script>
    // Ambil elemen pesan flash session
    const successAlert = document.getElementById('success-alert');

    // Cek apakah elemen pesan ada
    if (successAlert) {
        // Setelah 10 detik, sembunyikan elemen pesan
        setTimeout(function() {
            successAlert.style.display = 'none';
        }, 10000); // 10 detik
    }
</script>
@endsection
