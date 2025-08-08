@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Informasi Harga Pasar</h4>
                <a href="{{ route('harga-pasar.create') }}" class="btn btn-success">+ Tambah Data Harga</a>
            </div>

            {{-- Alert --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Highlight Cards --}}
            <div class="row mb-4">
                @foreach ($hargaPasars->take(3) as $item)
                    <div class="col-md-4 mb-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="fw-bold mb-1">{{ $item->komoditas }}</h5>
                                <p class="mb-0"><i class="bi bi-geo-alt"></i> {{ $item->wilayah }}</p>
                                <h4 class="text-success fw-bold my-2">Rp {{ number_format($item->harga, 0, ',', '.') }}
                                    <small class="text-muted">/{{ $item->satuan }}</small>
                                </h4>
                                <p class="mb-0 text-muted"><i class="bi bi-calendar-event"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>
                                @if ($item->keterangan)
                                    <small class="text-secondary d-block mt-2"><i class="bi bi-info-circle"></i>
                                        {{ $item->keterangan }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Tabel Data Lengkap --}}
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Komoditas</th>
                                    <th>Wilayah</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($hargaPasars as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->komoditas }}</td>
                                        <td>{{ $item->wilayah }}</td>
                                        <td>{{ $item->satuan }}</td>
                                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                                        <td>{{ $item->keterangan ?? '-' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('harga-pasar.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i>Edit</a>
                                            <form action="{{ route('harga-pasar.destroy', $item->id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-sm"><i
                                                        class="bi bi-trash"></i>Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">Belum ada data harga pasar.</td>
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
