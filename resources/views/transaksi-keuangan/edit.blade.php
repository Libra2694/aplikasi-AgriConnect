@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Transaksi Keuangan</h5>
                    <a href="{{ route('transaksi-keuangan.index') }}" class="btn btn-sm btn-secondary">← Kembali</a>
                </div>
                <div class="card-body">
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

                    <form action="{{ route('transaksi-keuangan.update', $transaksi->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="kategori">Kategori</label>
                            <input type="text" name="kategori" class="form-control" required
                                value="{{ old('kategori', $transaksi->kategori) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="keterangan">Deskripsi</label>
                            <textarea name="keterangan" rows="3" class="form-control">{{ old('keterangan') }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jumlah">Jumlah (Rp)</label>
                            <input type="number" name="jumlah" class="form-control" required
                                value="{{ old('jumlah', $transaksi->jumlah) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required
                                value="{{ old('tanggal', \Carbon\Carbon::parse($transaksi->tanggal)->format('Y-m-d')) }}">
                        </div>

                        <div class="form-group mb-4">
                            <label for="jenis">Jenis Transaksi</label>
                            <select name="jenis" class="form-select" required>
                                <option value="">-- Pilih Jenis --</option>
                                <option value="Pemasukan"
                                    {{ old('jenis', $transaksi->jenis) == 'Pemasukan' ? 'selected' : '' }}>Pemasukan
                                </option>
                                <option value="Pengeluaran"
                                    {{ old('jenis', $transaksi->jenis) == 'Pengeluaran' ? 'selected' : '' }}>Pengeluaran
                                </option>
                            </select>
                        </div>

                        <div class="form-group text-end">
                            <button type="submit" class="btn btn-primary">Perbarui Transaksi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
