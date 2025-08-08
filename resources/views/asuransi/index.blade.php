@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Asuransi Pertanian</h4>
                <a href="{{ route('asuransi.create') }}" class="btn btn-success">
                    + Ajukan Asuransi
                </a>
            </div>

            {{-- Alert --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Table --}}
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tanaman</th>
                                    <th>Jenis Asuransi</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($asuransis as $asuransi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $asuransi->tanaman->nama_tanaman ?? '-' }}</td>
                                        <td>{{ $asuransi->jenis_asuransi }}</td>
                                        <td>{{ \Carbon\Carbon::parse($asuransi->tanggal_daftar)->format('d/m/Y') }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $asuransi->status == 'Diterima' ? 'success' : ($asuransi->status == 'Ditolak' ? 'danger' : 'secondary') }}">
                                                {{ $asuransi->status }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('asuransi.edit', $asuransi->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('asuransi.destroy', $asuransi->id) }}" method="POST"
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
                                        <td colspan="6" class="text-center text-muted">Belum ada pengajuan asuransi.</td>
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
