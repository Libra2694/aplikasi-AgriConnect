@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0">Ajukan Pinjaman Modal</h4>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('pinjaman.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_usaha" class="form-label">Nama Usaha</label>
                            <input type="text" class="form-control" name="nama_usaha" placeholder="Contoh: Usaha Tani Padi" required>
                        </div>

                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah Pinjaman</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="jumlah" placeholder="Contoh: 5000000" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="alasan" class="form-label">Alasan Pengajuan</label>
                            <textarea class="form-control" name="alasan" rows="3" placeholder="Contoh: Untuk beli pupuk dan bibit jagung" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
                            <input type="date" class="form-control" name="tanggal_pengajuan" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success me-2 px-4">Ajukan</button>
                            <a href="{{ route('pinjaman.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
