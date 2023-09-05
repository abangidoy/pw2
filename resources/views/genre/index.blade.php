@extends('layout.master')

@section('judul')
    Daftar Genre
@endsection

@push('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endpush

@section('content')
<a class="btn btn-secondary mb-3" href="/genre/create"><i class="bi bi-person-plus-fill"></i> Tambah Genre</a>
@if(session('success'))
<div id="success-alert" class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if(session('warning'))
<div class="alert alert-warning">
    {{ session('warning') }}
</div>
@endif
<table class="table" id="example1">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Genre</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($genres as $key => $genre)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $genre->nama }}</td>
            <td>
                <a href="/genre/{{ $genre->id }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pen-fill"></i></i></a>
                <button type="button" class="btn btn-warning btn-sm btn-delete" data-id="{{ $genre->id }}">
                    <i class="bi bi-trash-fill"></i>
                </button>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3"><h2>Data tidak ada</h2></td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

@push('script')
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#example1').DataTable();
        
        const deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const itemId = button.getAttribute('data-id');
                Swal.fire({
                    title: "Konfirmasi",
                    text: "Apakah Anda ingin menghapus data ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#FFCC00",
                    cancelButtonColor: "#FFCC00",
                    confirmButtonText: "Ya, Hapus",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = '/genre/' + itemId;
                        form.style.display = 'none';
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        const csrfInput = document.createElement('input');
                        csrfInput.name = '_token';
                        csrfInput.value = csrfToken;
                        form.appendChild(csrfInput);
                        const methodInput = document.createElement('input');
                        methodInput.name = '_method';
                        methodInput.value = 'DELETE';
                        form.appendChild(methodInput);
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
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

@endpush