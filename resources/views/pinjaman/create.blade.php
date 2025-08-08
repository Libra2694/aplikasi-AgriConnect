@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Ajukan Pinjaman Modal</h5>
                    <a href="{{ route('pinjaman-modal.index') }}" class="btn btn-sm btn-secondary">← Kembali</a>
                </div>
                <div class="card-body">

                    {{-- Tampilkan error validasi --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Oops!</strong> Ada kesalahan saat input:<br><br>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('pinjaman-modal.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="judul">Judul Pengajuan</label>
                            <input type="text" name="judul" class="form-control" required value="{{ old('judul') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="jumlah">Jumlah Pinjaman (Rp)</label>
                            <input type="number" name="jumlah" class="form-control" required value="{{ old('jumlah') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                            <input type="date" name="tanggal_pengajuan" class="form-control" required
                                value="{{ old('tanggal_pengajuan', now()->toDateString()) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="alasan">Alasan Pengajuan</label>
                            <textarea name="alasan" class="form-control" rows="3" required>{{ old('alasan') }}</textarea>
                        </div>

                        <div class="form-group text-end mt-4">
                            <button type="submit" class="btn btn-success">Ajukan Pinjaman</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
