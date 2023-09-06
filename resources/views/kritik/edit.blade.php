@extends('layout.master')

@section('judul')
    Edit Kritik
@endsection

@section('content')
<form method="post" action="/kritik/{{ $kritik->id }}">
@if(session('success'))
<div id="success-alert" class="alert alert-success">
    {{ session('success') }}
</div>
@endif
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Isi Kritik</label>
        <textarea name="content" class="form-control">{{ $kritik->content }}</textarea>
    </div>

    <div class="form-group">
        <label>Point</label>
        <input type="number" name="point" value="{{ $kritik->point }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-warning"><i class="bi bi-save"></i> Simpan</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelector('form').addEventListener('submit', function (event) {
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