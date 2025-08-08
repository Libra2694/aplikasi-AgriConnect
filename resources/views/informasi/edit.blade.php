@extends('layouts.app')

@section('title', 'Edit Informasi Petani')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="fw-bold mb-0">✏️ Edit Informasi Petani</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('informasi.update', $info->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control"
                                    value="{{ $info->judul }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori" id="kategori" class="form-select" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach (['Hama', 'Penyakit', 'Tips', 'Cuaca', 'Lainnya'] as $kategori)
                                        <option value="{{ $kategori }}"
                                            {{ $info->kategori === $kategori ? 'selected' : '' }}>
                                            {{ $kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_terbit" class="form-label">Tanggal Terbit</label>
                                <input type="date" name="tanggal_terbit" id="tanggal_terbit" class="form-control"
                                    value="{{ $info->tanggal_terbit->format('Y-m-d') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="konten" class="form-label">Konten</label>
                                <textarea name="konten" id="konten" rows="6" class="form-control" required>{{ $info->konten }}</textarea>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('informasi.index') }}" class="btn btn-light">Kembali</a>
                                <button type="submit" class="btn btn-success">Update Informasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
