@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ $topik['judul'] }}</h3>
    <p class="text-muted">oleh <strong>{{ $topik['penulis'] }}</strong> - {{ $topik['waktu'] }}</p>
    <div class="mb-4">{{ $topik['konten'] }}</div>

    <hr>

    <h5>Komentar</h5>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Daftar Komentar -->
    @forelse ($komentar as $komen)
        <div class="mb-3 p-3 border rounded">
            <strong>{{ $komen['nama'] }}</strong>
            <p class="mb-1">{{ $komen['isi'] }}</p>
            <small class="text-muted">{{ $komen['waktu'] }}</small>
        </div>
    @empty
        <p class="text-muted">Belum ada komentar.</p>
    @endforelse

    <!-- Form Komentar -->
    <hr>
    <h6>Tambahkan Komentar</h6>
    <form action="{{ route('komunitas.komentar', $topik['id']) }}" method="POST">
        @csrf
        <div class="mb-2">
            <input type="text" name="nama" class="form-control" placeholder="Nama Anda" required>
        </div>
        <div class="mb-2">
            <textarea name="isi" class="form-control" placeholder="Tulis komentar..." rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Kirim</button>
    </form>
</div>
@endsection
