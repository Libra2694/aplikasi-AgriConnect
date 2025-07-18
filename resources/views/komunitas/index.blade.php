@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">🌾 Komunitas Petani</h2>
    <p class="text-muted">Tempat berkumpul, berdiskusi, dan berbagi ilmu antar petani Indonesia.</p>

    <!-- Tombol Buat Topik -->
    <div class="text-end my-3">
        <a href="{{ route('komunitas.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Buat Topik Baru
        </a>
    </div>

    <!-- List Diskusi -->
    <div class="row">
        <!-- Contoh Topik Diskusi -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">🌱 Cara Mengatasi Hama Wereng</h5>
                    <p class="card-text text-muted small">oleh <strong>Pak Budi</strong> - 2 jam yang lalu</p>
                    <p class="card-text">Bagaimana cara efektif mengatasi hama wereng pada tanaman padi? Mohon saran dari teman-teman.</p>
                    <a href="{{ route('komunitas.show', 1) }}" class="btn btn-outline-success btn-sm">Lihat Diskusi</a>
                </div>
            </div>
        </div>

        <!-- Topik Lain -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title">🚜 Alat Irigasi Modern</h5>
                    <p class="card-text text-muted small">oleh <strong>Ibu Sari</strong> - kemarin</p>
                    <p class="card-text">Ada yang sudah mencoba alat irigasi tetes otomatis? Efektif gak buat lahan sempit?</p>
                    <a href="{{ route('komunitas.show', 2) }}" class="btn btn-outline-success btn-sm">Lihat Diskusi</a>
                </div>
            </div>
        </div>

        <!-- Tambah diskusi lainnya di sini -->
    </div>
</div>
@endsection
