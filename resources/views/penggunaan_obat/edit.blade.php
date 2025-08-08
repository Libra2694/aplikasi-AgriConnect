@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Penggunaan Obat / Pupuk</h5>
                    <a href="{{ route('penggunaan-obat.index') }}" class="btn btn-sm btn-secondary">← Kembali</a>
                </div>
                <div class="card-body">
                    {{-- Tampilkan error jika ada --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Terjadi kesalahan!</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('penggunaan-obat.update', $penggunaanObat->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Pilih Tanaman --}}
                        <div class="mb-3">
                            <label for="tanaman_id" class="form-label">Tanaman</label>
                            <select name="tanaman_id" id="tanaman_id" class="form-select" required>
                                <option value="">-- Pilih Tanaman --</option>
                                @foreach ($tanamans as $tanaman)
                                    <option value="{{ $tanaman->id }}"
                                        {{ old('tanaman_id', $penggunaanObat->tanaman_id) == $tanaman->id ? 'selected' : '' }}>
                                        {{ $tanaman->nama_tanaman }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Nama Obat --}}
                        <div class="mb-3">
                            <label for="nama_obat" class="form-label">Nama Obat / Pupuk</label>
                            <input type="text" name="nama_obat" id="nama_obat" class="form-control"
                                value="{{ old('nama_obat', $penggunaanObat->nama_obat) }}" required>
                        </div>

                        {{-- Dosis --}}
                        <div class="mb-3">
                            <label for="dosis" class="form-label">Dosis (misal: 10 ml/l)</label>
                            <input type="text" name="dosis" id="dosis" class="form-control"
                                value="{{ old('dosis', $penggunaanObat->dosis) }}" required>
                        </div>

                        {{-- Tanggal Penggunaan --}}
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal Penggunaan</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                value="{{ old('tanggal', $penggunaanObat->tanggal->format('Y-m-d')) }}" required>
                        </div>

                        {{-- Catatan --}}
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan (opsional)</label>
                            <textarea name="catatan" id="catatan" class="form-control" rows="3">{{ old('catatan', $penggunaanObat->catatan) }}</textarea>
                        </div>

                        {{-- Tombol --}}
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
