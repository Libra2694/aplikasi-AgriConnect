@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Produk Baru</h1>

    <form method="POST" action="{{ route('pasar-hasil-tani.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Harga (Rp)</label>
            <input type="number" name="harga" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Gambar Produk</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan Produk</button>
    </form>
</div>
@endsection
