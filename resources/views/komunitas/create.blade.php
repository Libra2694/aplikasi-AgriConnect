@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Buat Topik Diskusi Baru</h3>

    <form action="{{ route('komunitas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Topik</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Anda</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="konten" class="form-label">Isi Diskusi</label>
            <textarea name="konten" id="konten" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Kirim</button>
        <a href="{{ route('komunitas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
