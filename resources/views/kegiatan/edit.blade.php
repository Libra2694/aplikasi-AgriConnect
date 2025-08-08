@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Kegiatan Pertanian</h5>
                    <a href="{{ route('kegiatan.index') }}" class="btn btn-sm btn-secondary">← Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="tanaman_id">Pilih Tanaman</label>
                            <select name="tanaman_id" class="form-select" required>
                                @foreach ($tanamans as $tanaman)
                                    <option value="{{ $tanaman->id }}"
                                        {{ $kegiatan->tanaman_id == $tanaman->id ? 'selected' : '' }}>
                                        {{ $tanaman->nama_tanaman }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tanggal">Tanggal Kegiatan</label>
                            <input type="date" name="tanggal" class="form-control"
                                value="{{ old('tanggal', $kegiatan->tanggal) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jenis_kegiatan">Jenis Kegiatan</label>
                            <input type="text" name="jenis_kegiatan" class="form-control"
                                value="{{ old('jenis_kegiatan', $kegiatan->jenis_kegiatan) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="catatan">Catatan (Opsional)</label>
                            <textarea name="catatan" class="form-control" rows="3">{{ old('catatan', $kegiatan->catatan) }}</textarea>
                        </div>

                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
