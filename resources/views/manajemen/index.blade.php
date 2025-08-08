@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">

            {{-- Judul --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Manajemen Pertanian</h4>
            </div>

            {{-- Statistik Card --}}
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-white bg-success">
                        <div class="card-body">
                            <h6 class="text-white">Jumlah Tanaman</h6>
                            <h3 class="fw-bold">{{ $jumlah_tanaman }}</h3>
                            <a href="{{ route('tanaman.index') }}" class="btn btn-light btn-sm mt-2">Lihat Tanaman</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-white bg-primary">
                        <div class="card-body">
                            <h6 class="text-white">Jumlah Kegiatan</h6>
                            <h3 class="fw-bold">{{ $jumlah_kegiatan }}</h3>
                            <a href="{{ route('kegiatan.index') }}" class="btn btn-light btn-sm mt-2">Lihat Kegiatan</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-white bg-warning">
                        <div class="card-body">
                            <h6 class="text-white">Jumlah Penggunaan Obat</h6>
                            <h3 class="fw-bold">{{ $jumlah_obat }}</h3>
                            <a href="{{ route('penggunaan-obat.index') }}" class="btn btn-light btn-sm mt-2">Lihat Obat</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Daftar Tanaman Terbaru --}}
            <div class="card mb-4">
                <div class="card-header bg-light fw-bold">Tanaman Terbaru</div>
                <div class="card-body p-0">
                    @if ($tanaman_terbaru->count())
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nama Tanaman</th>
                                        <th>Jenis</th>
                                        <th>Tanggal Tanam</th>
                                        <th>Perkiraan Panen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tanaman_terbaru as $tanaman)
                                        <tr>
                                            <td>{{ $tanaman->nama_tanaman }}</td>
                                            <td>{{ $tanaman->jenis ?? '-' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($tanaman->tanggal_tanam)->format('d/m/Y') }}</td>
                                            <td>{{ $tanaman->perkiraan_panen ? \Carbon\Carbon::parse($tanaman->perkiraan_panen)->format('d/m/Y') : '-' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="p-4 text-muted text-center">Belum ada data tanaman.</div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
