@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Asuransi Pertanian</h5>
                    <a href="{{ route('asuransi.index') }}" class="btn btn-sm btn-secondary">← Kembali</a>
                </div>
                <div class="card-body">
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

                    <form action="{{ route('asuransi.update', $asuransi->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Pilih Tanaman --}}
                        <div class="mb-3">
                            <label for="tanaman_id" class="form-label">Tanaman</label>
                            <select name="tanaman_id" id="tanaman_id" class="form-select" required>
                                <option value="">-- Pilih Tanaman --</option>
                                @foreach ($tanamans as $tanaman)
                                    <option value="{{ $tanaman->id }}"
                                        {{ old('tanaman_id', $asuransi->tanaman_id) == $tanaman->id ? 'selected' : '' }}>
                                        {{ $tanaman->nama_tanaman }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Jenis Asuransi --}}
                        <div class="mb-3">
                            <label for="jenis_asuransi" class="form-label">Jenis Asuransi</label>
                            <input type="text" name="jenis_asuransi" id="jenis_asuransi" class="form-control"
                                value="{{ old('jenis_asuransi', $asuransi->jenis_asuransi) }}" required>
                        </div>

                        {{-- Tanggal Daftar --}}
                        <div class="mb-3">
                            <label for="tanggal_daftar" class="form-label">Tanggal Daftar</label>
                            <input type="date" name="tanggal_daftar" id="tanggal_daftar" class="form-control"
                                value="{{ old('tanggal_daftar', $asuransi->tanggal_daftar) }}" required>
                        </div>

                        {{-- Catatan --}}
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan (opsional)</label>
                            <textarea name="catatan" id="catatan" class="form-control" rows="3">{{ old('catatan', $asuransi->catatan) }}</textarea>
                        </div>

                        {{-- Status --}}
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="Menunggu"
                                    {{ old('status', $asuransi->status) == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="Diterima"
                                    {{ old('status', $asuransi->status) == 'Diterima' ? 'selected' : '' }}>Diterima
                                </option>
                                <option value="Ditolak"
                                    {{ old('status', $asuransi->status) == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>

                        {{-- Tombol Simpan --}}
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
