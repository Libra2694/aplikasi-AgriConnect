@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Tanaman Baru</h5>
                    <a href="{{ route('tanaman.index') }}" class="btn btn-sm btn-secondary">← Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('tanaman.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="nama_tanaman">Nama Tanaman</label>
                            <input type="text" name="nama_tanaman" class="form-control" required
                                value="{{ old('nama_tanaman') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="jenis">Jenis</label>
                            <input type="text" name="jenis" class="form-control" value="{{ old('jenis') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="tanggal_tanam">Tanggal Tanam</label>
                            <input type="date" name="tanggal_tanam" class="form-control" required
                                value="{{ old('tanggal_tanam') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="perkiraan_panen">Perkiraan Panen</label>
                            <input type="date" name="perkiraan_panen" class="form-control"
                                value="{{ old('perkiraan_panen') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
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
