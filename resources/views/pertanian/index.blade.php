@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Data Pertanian</h2><a href="{{ route('pertanian.create') }}" class="btn btn-success mb-3">+ Pertanian</a>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive shadow rounded">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>🌾 Nama Lahan</th>
                    <th>📍 Lokasi</th>
                    <th>🥬 Komoditas</th>
                    <th>📅 Tanggal Tanam</th>
                    <th>⚙️ Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->nama_lahan }}</td>
                        <td>{{ $item->lokasi }}</td>
                        <td>{{ $item->komoditas }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_tanam)->format('d-m-Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('pertanian.edit', $item->id) }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('pertanian.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">
                                    <i class="bi bi-trash"></i> Hapus
                                   </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada data pertanian yang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
