@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Daftar Pengajuan Pinjaman Modal</h2>
    <a href="{{ route('pinjaman.create') }}" class="btn btn-success mb-3">+ Ajukan Pinjaman</a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Usaha</th>
                    <th>Jumlah</th>
                    <th>Alasan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pinjamans as $pinjaman)
                    <tr>
                        <td>{{ $pinjaman->usaha }}</td>
                        <td>Rp {{ number_format($pinjaman->jumlah, 0, ',', '.') }}</td>
                        <td>{{ $pinjaman->alasan }}</td>
                        <td>{{ \Carbon\Carbon::parse($pinjaman->tanggal)->format('d-m-Y') }}</td>
                        <td>
                            <span class="badge 
                                @if($pinjaman->status == 'Diproses') bg-warning 
                                @elseif($pinjaman->status == 'Disetujui') bg-success 
                                @else bg-danger 
                                @endif">
                                {{ $pinjaman->status }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('pinjaman.destroy', $pinjaman->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengajuan pinjaman ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada pengajuan pinjaman.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection