@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Data Harga Pasar</h5>
                    <a href="{{ route('harga-pasar.index') }}" class="btn btn-sm btn-secondary">← Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('harga-pasar.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="komoditas">Komoditas</label>
                            <input type="text" name="komoditas" class="form-control" required
                                value="{{ old('komoditas') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="wilayah">Wilayah</label>
                            <input type="text" name="wilayah" class="form-control" required value="{{ old('wilayah') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="satuan">Satuan</label>
                            <select name="satuan" class="form-select" required>
                                <option value="Kg" {{ old('satuan') == 'Kg' ? 'selected' : '' }}>Kg</option>
                                <option value="Ton" {{ old('satuan') == 'Ton' ? 'selected' : '' }}>Ton</option>
                                <option value="Liter" {{ old('satuan') == 'Liter' ? 'selected' : '' }}>Liter</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="harga">Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control" required value="{{ old('harga') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required
                                value="{{ old('tanggal', now()->toDateString()) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="keterangan">Keterangan (opsional)</label>
                            <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan') }}</textarea>
                        </div>

                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
