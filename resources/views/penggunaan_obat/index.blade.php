@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Penggunaan Obat & Pupuk</h4>
                <a href="{{ route('penggunaan-obat.create') }}" class="btn btn-success">+ Tambah Penggunaan Obat</a>
            </div>

            {{-- Alert --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Tabel Obat --}}
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tanaman</th>
                                    <th>Nama Obat</th>
                                    <th>Dosis</th>
                                    <th>Tanggal</th>
                                    <th>Catatan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($penggunaanObats as $obat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $obat->tanaman->nama_tanaman ?? '-' }}</td>
                                        <td>{{ $obat->nama_obat }}</td>
                                        <td>{{ $obat->dosis }}</td>
                                        <td>{{ \Carbon\Carbon::parse($obat->tanggal)->format('d/m/Y') }}</td>
                                        <td>{{ $obat->catatan ?? '-' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('penggunaan-obat.edit', $obat->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('penggunaan-obat.destroy', $obat->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Belum ada data penggunaan obat.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
