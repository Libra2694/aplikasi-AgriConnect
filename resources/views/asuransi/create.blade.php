@extends('layouts.app')

@section('content')
<style>
    .form-container {
        max-width: 600px;
        margin: 2rem auto;
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .form-container h2 {
        font-weight: 600;
        text-align: center;
        margin-bottom: 30px;
        color: #000000;
    }

    label {
        font-weight: 500;
        color: #333;
    }

    input, select {
        border-radius: 6px;
    }

    .btn-submit {
        background-color: #000000;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: bold;
    }

    .btn-submit:hover {
        background-color: #333333;
    }

    .btn-back {
        color: #000000;
        text-decoration: none;
        margin-bottom: 1rem;
        display: inline-block;
    }

    .btn-back:hover {
        text-decoration: underline;
    }
</style>

<div class="form-container">
    <a href="{{ route('asuransi.index') }}" class="btn-back">← Kembali ke Data Asuransi</a>
    <h2>Form Pendaftaran Asuransi</h2>

    <form action="{{ route('asuransi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama">Nama Petani</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
        </div>

        <div class="mb-3">
            <label for="jenis_tanaman">Jenis Tanaman</label>
            <select class="form-control" id="jenis_tanaman" name="jenis_tanaman" required>
                <option value="">-- Pilih Tanaman --</option>
                <option>Padi</option>
                <option>Jagung</option>
                <option>Kedelai</option>
                <option>Sayuran</option>
                <option>Buah-buahan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="luas_lahan">Luas Lahan (ha)</label>
            <input type="number" step="0.1" class="form-control" id="luas_lahan" name="luas_lahan" placeholder="Contoh: 1.5" required>
        </div>

        <div class="mb-3">
            <label for="lokasi">Lokasi Lahan</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan alamat/lokasi" required>
        </div>

        <button type="submit" class="btn btn-submit">Daftarkan Asuransi</button>
    </form>
</div>
@endsection
