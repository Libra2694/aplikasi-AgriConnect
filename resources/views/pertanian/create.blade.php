@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg rounded-4">
        <div class="card-header bg-success text-white text-center rounded-top-4">
            <h3 class="mb-0">🌾 Tambah Data Pertanian</h3>
        </div>
        <div class="card-body px-4 py-5">
            <form action="{{ route('pertanian.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="nama_lahan" class="form-label fw-semibold">Nama Lahan</label>
                    <input type="text" name="nama_lahan" id="nama_lahan" class="form-control shadow-sm" placeholder="Contoh: Lahan A1" required>
                </div>

                <div class="mb-4">
                    <label for="lokasi" class="form-label fw-semibold">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control shadow-sm" placeholder="Contoh: Desa Sukamaju, Kab. Sleman" required>
                </div>

                <div class="mb-4">
                    <label for="komoditas" class="form-label fw-semibold">Komoditas</label>
                    <input type="text" name="komoditas" id="komoditas" class="form-control shadow-sm" placeholder="Contoh: Padi, Jagung, Cabai" required>
                </div>

                <div class="mb-4">
                    <label for="tanggal_tanam" class="form-label fw-semibold">Tanggal Tanam</label>
                    <input type="date" name="tanggal_tanam" id="tanggal_tanam" class="form-control shadow-sm" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('pertanian.index') }}" class="btn btn-outline-secondary">
                        ← Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        💾 Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
