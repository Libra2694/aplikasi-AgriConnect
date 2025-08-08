@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Produk Baru</h5>
                    <a href="{{ route('produk.index') }}" class="btn btn-sm btn-secondary">← Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" required
                                value="{{ old('nama_produk') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="kategori">Kategori</label>
                            <input type="text" name="kategori" class="form-control" required
                                value="{{ old('kategori') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="harga_per_kg">Harga per Kg (Rp)</label>
                            <input type="number" name="harga_per_kg" class="form-control" required
                                value="{{ old('harga_per_kg') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="stok_kg">Stok</label>
                            <div class="input-group">
                                <input type="number" name="stok_kg" class="form-control" required
                                    value="{{ old('stok_kg') }}">
                                <select name="satuan" class="form-select">
                                    <option value="Kg">Kg</option>
                                    <option value="Ton">Ton</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="status_produk">Status Produk</label>
                            <select name="status_produk" class="form-select" required>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Habis">Habis</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="deskripsi">Deskripsi Produk</label>
                            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="gambar">Gambar Produk</label>
                            <input type="file" name="gambar" accept="image/*" class="form-control"
                                onchange="previewImage(event)">
                            <img id="preview" src="#" class="img-thumbnail mt-2 d-none" width="150">
                        </div>

                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Preview Image Script --}}
    <script>
        function previewImage(event) {
            const input = event.target;
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('preview');
                preview.src = reader.result;
                preview.classList.remove('d-none');
            }
            if (input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
