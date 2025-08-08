@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Data Tanaman</h5>
                    <a href="{{ route('tanaman.index') }}" class="btn btn-sm btn-secondary">← Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('tanaman.update', $tanaman->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="nama_tanaman">Nama Tanaman</label>
                            <input type="text" name="nama_tanaman" class="form-control" required
                                value="{{ old('nama_tanaman', $tanaman->nama_tanaman) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="jenis">Jenis</label>
                            <input type="text" name="jenis" class="form-control"
                                value="{{ old('jenis', $tanaman->jenis) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="tanggal_tanam">Tanggal Tanam</label>
                            <input type="date" name="tanggal_tanam" class="form-control" required
                                value="{{ old('tanggal_tanam', $tanaman->tanggal_tanam) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="perkiraan_panen">Perkiraan Panen</label>
                            <input type="date" name="perkiraan_panen" class="form-control"
                                value="{{ old('perkiraan_panen', $tanaman->perkiraan_panen) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $tanaman->deskripsi) }}</textarea>
                        </div>

                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
