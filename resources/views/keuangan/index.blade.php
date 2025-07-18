@extends('layouts.app') {{-- Sesuaikan jika kamu pakai layout lain --}}

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Layanan Keuangan</h4>
        </div>
        <div class="card-body">
            <p>Berikut adalah fitur layanan keuangan yang tersedia:</p>
            
            <div class="row">
                <!-- Fitur 1: Pinjaman Modal -->
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Pinjaman Modal</h5>
                            <p class="card-text">Ajukan pinjaman modal usaha untuk mendukung pertumbuhan bisnis pertanianmu.</p>
                            <a href="{{ route('pinjaman.index') }}" class="btn btn-primary">Ajukan Pinjaman</a>

                        </div>
                    </div>
                </div>

                <!-- Fitur 2: Asuransi Pertanian -->
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Asuransi Pertanian</h5>
                            <p class="card-text">Lindungi hasil panenmu dari risiko cuaca ekstrim dan gagal panen.</p>
                        <a href="{{ route('asuransi.index') }}" class="btn btn-primary">Lihat Asuransi</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tambahan layanan lainnya bisa ditambahkan di bawah ini --}}
        </div>
    </div>
</div>
@endsection
