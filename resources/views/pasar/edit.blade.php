@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Produk: {{ $produk->nama_produk }}</h5>
                    <a href="{{ route('produk.index') }}" class="btn btn-sm btn-secondary">← Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')

                        <div class="form-group mb-3">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control"
                                value="{{ old('nama_produk', $produk->nama_produk) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="kategori">Kategori</label>
                            <input type="text" name="kategori" class="form-control"
                                value="{{ old('kategori', $produk->kategori) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="harga_per_kg">Harga per Kg (Rp)</label>
                            <input type="number" name="harga_per_kg" class="form-control"
                                value="{{ old('harga_per_kg', $produk->harga_per_kg) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="stok_kg">Stok</label>
                            <div class="input-group">
                                <input type="number" name="stok_kg" class="form-control"
                                    value="{{ old('stok_kg', $produk->stok_kg) }}" required>
                                <select name="satuan" class="form-select">
                                    <option value="Kg" {{ $produk->satuan == 'Kg' ? 'selected' : '' }}>Kg</option>
                                    <option value="Ton" {{ $produk->satuan == 'Ton' ? 'selected' : '' }}>Ton</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="status_produk">Status Produk</label>
                            <select name="status_produk" class="form-select" required>
                                <option value="Tersedia" {{ $produk->status_produk == 'Tersedia' ? 'selected' : '' }}>
                                    Tersedia</option>
                                <option value="Habis" {{ $produk->status_produk == 'Habis' ? 'selected' : '' }}>Habis
                                </option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="deskripsi">Deskripsi Produk</label>
                            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="gambar">Gambar Produk</label>
                            <input type="file" name="gambar" accept="image/*" class="form-control"
                                onchange="previewImage(event)">
                            @if ($produk->gambar)
                                <img id="preview" src="{{ asset('storage/' . $produk->gambar) }}"
                                    class="img-thumbnail mt-2" width="150">
                            @else
                                <img id="preview" src="#" class="img-thumbnail mt-2 d-none" width="150">
                            @endif
                        </div>

                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
