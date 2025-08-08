@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Daftar Tanaman</h4>
                <a href="{{ route('tanaman.create') }}" class="btn btn-success">+ Tambah Tanaman</a>
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
                                    <th>Nama Tanaman</th>
                                    <th>Jenis</th>
                                    <th>Tanggal Tanam</th>
                                    <th>Perkiraan Panen</th>
                                    <th>Deskripsi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tanamans as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_tanaman }}</td>
                                        <td>{{ $item->jenis ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_tanam)->format('d/m/Y') }}</td>
                                        <td>{{ $item->perkiraan_panen ? \Carbon\Carbon::parse($item->perkiraan_panen)->format('d/m/Y') : '-' }}
                                        </td>
                                        <td>{{ $item->deskripsi ?? '-' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('tanaman.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('tanaman.destroy', $item->id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Yakin hapus tanaman ini?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">Belum ada data tanaman.</td>
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
