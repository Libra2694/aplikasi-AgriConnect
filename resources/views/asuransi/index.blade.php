@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #ffffff;
        color: #000000;
    }

    .container {
        background-color: #f9f9f9;
        padding: 2rem;
        border-radius: 8px;
        border: 1px solid #ccc;
    }

    h2 {
        font-weight: bold;
        margin-bottom: 20px;
        color: #000000;
    }

    .btn-primary {
        background-color: #000000;
        color: #ffffff;
        border: none;
    }

    .btn-danger {
        background-color: #e60000;
        color: #ffffff;
        border: none;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .table {
        background-color: #ffffff;
        color: #000000;
    }

    .table th, .table td {
        border: 1px solid #ddd;
    }

    .table th {
        background-color: #f0f0f0;
    }

    .text-muted {
        color: #6c757d;
    }
</style>

<div class="container">
    <h2>Data Asuransi Pertanian</h2>
    <a href="{{ route('asuransi.create') }}" class="btn btn-primary mb-3">+ Tambah Asuransi</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis Tanaman</th>
                <th>Luas Lahan</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dataAsuransi as $asuransi)
            <tr>
                <td>{{ $asuransi->nama }}</td>
                <td>{{ $asuransi->jenis_tanaman }}</td>
                <td>{{ $asuransi->luas_lahan }} ha</td>
                <td>{{ $asuransi->lokasi }}</td>
                <td>
                    <form action="{{ route('asuransi.destroy', $asuransi->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted">Belum ada data asuransi.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
