@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Daftar Kegiatan Pertanian</h4>
                <a href="{{ route('kegiatan.create') }}" class="btn btn-success">+ Tambah Kegiatan</a>
            </div>

            {{-- Alert --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Tabel --}}
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tanaman</th>
                                    <th>Tanggal</th>
                                    <th>Jenis Kegiatan</th>
                                    <th>Catatan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kegiatans as $kegiatan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kegiatan->tanaman->nama_tanaman }}</td>
                                        <td>{{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d/m/Y') }}</td>
                                        <td>{{ $kegiatan->jenis_kegiatan }}</td>
                                        <td>{{ $kegiatan->catatan ?? '-' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('kegiatan.edit', $kegiatan->id) }}"
                                                class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Belum ada data kegiatan.</td>
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
