@extends('layouts.app')

@section('title', 'Informasi Petani')

@section('content')
    <div class="container-fluid px-4 py-5">
        {{-- Hero Section --}}
        <div class="row mb-5">
            <div class="col-12">
                <div class="bg-gradient-primary rounded-5 p-5 text-white position-relative overflow-hidden">
                    <div class="position-absolute top-0 end-0 opacity-10">
                        <i class="mdi mdi-sprout" style="font-size: 120px;"></i>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h1 class="display-5 fw-bold mb-3">
                                🌾 Informasi Petani
                            </h1>
                            <p class="lead mb-0 opacity-90">
                                Dapatkan informasi terkini seputar pertanian, tips berkebun, dan solusi permasalahan tanaman
                            </p>
                        </div>
                        <div class="col-lg-4 text-end">
                            <a href="{{ route('informasi.create') }}"
                                class="btn btn-light btn-lg rounded-pill px-5 py-3 shadow-lg">
                                <i class="mdi mdi-plus-circle me-2"></i>
                                Tambah Informasi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Content Section --}}
        <div class="row">
            <div class="col-12">
                @forelse ($data as $item)
                    <div class="card border-0 shadow-lg rounded-4 mb-4 overflow-hidden hover-lift">
                        {{-- Card Header with Category Badge --}}
                        <div class="card-header border-0 bg-transparent p-4 pb-0">
                            <div class="d-flex justify-content-between align-items-start flex-wrap">
                                <div class="flex-grow-1 me-3">
                                    <h4 class="fw-bold mb-2 text-dark">{{ $item->judul }}</h4>
                                    <div class="d-flex align-items-center text-muted small">
                                        <i class="mdi mdi-calendar-outline me-1"></i>
                                        <span>{{ \Carbon\Carbon::parse($item->tanggal_terbit)->translatedFormat('d F Y') }}</span>
                                    </div>
                                </div>
                                <span
                                    class="badge fs-6 
                                    @if ($item->kategori == 'Hama') bg-gradient-danger
                                    @elseif($item->kategori == 'Penyakit') 
                                        bg-gradient-warning
                                    @elseif($item->kategori == 'Tips') 
                                        bg-gradient-success
                                    @elseif($item->kategori == 'Cuaca') 
                                        bg-gradient-info
                                    @else 
                                        bg-gradient-secondary @endif
                                    text-white rounded-pill px-4 py-2 shadow-sm">
                                    @if ($item->kategori == 'Hama')
                                        🐛
                                    @elseif($item->kategori == 'Penyakit')
                                        🦠
                                    @elseif($item->kategori == 'Tips')
                                        💡
                                    @elseif($item->kategori == 'Cuaca')
                                        🌤️
                                    @else
                                        📋
                                    @endif
                                    {{ $item->kategori }}
                                </span>
                            </div>
                        </div>

                        {{-- Card Body --}}
                        <div class="card-body p-4 pt-2">
                            <p class="text-muted lh-lg mb-4" style="font-size: 1.05rem;">
                                {{ \Illuminate\Support\Str::limit($item->konten, 150) }}
                            </p>

                            {{-- Action Buttons --}}
                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ route('informasi.show', $item->id) }}"
                                    class="btn btn-primary rounded-pill px-4 py-2 shadow-sm">
                                    <i class="mdi mdi-forum-outline me-2"></i>
                                    Buka Diskusi
                                </a>
                                <a href="{{ route('informasi.edit', $item->id) }}"
                                    class="btn btn-outline-warning rounded-pill px-4 py-2">
                                    <i class="mdi mdi-pencil-outline me-2"></i>
                                    Edit
                                </a>
                                <form action="{{ route('informasi.destroy', $item->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus informasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger rounded-pill px-4 py-2">
                                        <i class="mdi mdi-trash-can-outline me-2"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- Decorative Bottom Border --}}
                        <div class="position-absolute bottom-0 start-0 w-100" style="height: 4px;">
                            <div
                                class="h-100 
                                @if ($item->kategori == 'Hama') bg-gradient-danger
                                @elseif($item->kategori == 'Penyakit') 
                                    bg-gradient-warning
                                @elseif($item->kategori == 'Tips') 
                                    bg-gradient-success
                                @elseif($item->kategori == 'Cuaca') 
                                    bg-gradient-info
                                @else 
                                    bg-gradient-secondary @endif">
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- Empty State --}}
                    <div class="text-center py-5">
                        <div class="mb-4">
                            <i class="mdi mdi-information-outline" style="font-size: 80px; color: #e9ecef;"></i>
                        </div>
                        <h4 class="text-muted mb-3">Belum Ada Informasi</h4>
                        <p class="text-muted mb-4">Belum ada informasi petani yang tersedia saat ini.</p>
                        <a href="{{ route('informasi.create') }}" class="btn btn-primary rounded-pill px-5 py-3">
                            <i class="mdi mdi-plus-circle me-2"></i>
                            Tambah Informasi Pertama
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Custom Styles --}}
    <style>
        /* Gradient backgrounds */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .bg-gradient-danger {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .bg-gradient-warning {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        }

        .bg-gradient-success {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        }

        .bg-gradient-info {
            background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
        }

        .bg-gradient-secondary {
            background: linear-gradient(135deg, #d2d3db 0%, #a8a8a8 100%);
        }

        /* Hover effects */
        .hover-lift {
            transition: all 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15) !important;
        }

        /* Button animations */
        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        /* Card improvements */
        .card {
            position: relative;
            backdrop-filter: blur(20px);
        }

        /* Typography improvements */
        .display-5 {
            font-weight: 800;
        }

        .lh-lg {
            line-height: 1.8;
        }

        /* Badge improvements */
        .badge {
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .container-fluid {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .bg-gradient-primary {
                padding: 2rem !important;
            }

            .display-5 {
                font-size: 2rem;
            }
        }
    </style>
@endsection
