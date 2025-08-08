@extends('layouts.app')

@section('title', $info->judul)

@section('content')
    <div class="container-fluid px-4 py-4">
        {{-- Breadcrumb Navigation --}}
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-light rounded-pill px-4 py-2">
                <li class="breadcrumb-item">
                    <a href="{{ route('informasi.index') }}" class="text-decoration-none text-primary">
                        <i class="mdi mdi-home-outline me-1"></i>
                        Informasi Petani
                    </a>
                </li>
                <li class="breadcrumb-item active text-muted">{{ \Illuminate\Support\Str::limit($info->judul, 50) }}</li>
            </ol>
        </nav>

        <div class="row">
            {{-- Main Content --}}
            <div class="col-lg-8 col-xl-9">
                {{-- Topic Card --}}
                <div class="card border-0 shadow-lg rounded-4 mb-4 overflow-hidden">
                    {{-- Category Header --}}
                    <div class="position-relative">
                        <div
                            class="bg-gradient-category 
                            @if ($info->kategori == 'Hama') category-hama
                            @elseif($info->kategori == 'Penyakit') category-penyakit
                            @elseif($info->kategori == 'Tips') category-tips
                            @elseif($info->kategori == 'Cuaca') category-cuaca
                            @else category-default @endif p-4">
                            <div class="d-flex align-items-center justify-content-between text-white">
                                <div class="d-flex align-items-center">
                                    <div class="category-icon me-3">
                                        @if ($info->kategori == 'Hama')
                                            🐛
                                        @elseif($info->kategori == 'Penyakit')
                                            🦠
                                        @elseif($info->kategori == 'Tips')
                                            💡
                                        @elseif($info->kategori == 'Cuaca')
                                            🌤️
                                        @else
                                            📋
                                        @endif
                                    </div>
                                    <div>
                                        <span class="badge bg-white bg-opacity-20 rounded-pill px-3 py-2 mb-1">
                                            {{ $info->kategori }}
                                        </span>
                                        <div class="small opacity-90">
                                            <i class="mdi mdi-calendar-outline me-1"></i>
                                            {{ \Carbon\Carbon::parse($info->tanggal_terbit)->translatedFormat('d F Y') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('informasi.edit', $info->id) }}"
                                        class="btn btn-light btn-sm rounded-pill px-3">
                                        <i class="mdi mdi-pencil-outline"></i>
                                    </a>
                                    <button class="btn btn-light btn-sm rounded-pill px-3" onclick="sharePost()"
                                        title="Bagikan">
                                        <i class="mdi mdi-share-variant-outline"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Content Body --}}
                    <div class="card-body p-5">
                        <h1 class="display-6 fw-bold mb-4 text-dark">{{ $info->judul }}</h1>

                        <div class="content-text fs-5 lh-lg text-dark">
                            {!! nl2br(e($info->konten)) !!}
                        </div>

                        {{-- Post Actions --}}
                        <div class="border-top pt-4 mt-5">
                            <div class="d-flex align-items-center gap-3">
                                <button class="btn btn-outline-primary rounded-pill px-4" onclick="likePost()">
                                    <i class="mdi mdi-thumb-up-outline me-2"></i>
                                    <span id="like-count">Suka (0)</span>
                                </button>
                                <button class="btn btn-outline-success rounded-pill px-4" onclick="bookmarkPost()">
                                    <i class="mdi mdi-bookmark-outline me-2"></i>
                                    Simpan
                                </button>
                                <button class="btn btn-outline-info rounded-pill px-4" onclick="scrollToComments()">
                                    <i class="mdi mdi-comment-outline me-2"></i>
                                    Diskusi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Discussion Section --}}
                <div class="card border-0 shadow-lg rounded-4 mb-4" id="discussion-section">
                    <div class="card-header bg-white border-0 p-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="fw-bold mb-0">
                                <i class="mdi mdi-forum text-primary me-2"></i>
                                Diskusi Forum
                            </h4>
                            <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                                0 Komentar
                            </span>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        {{-- Comment Form --}}
                        <div class="comment-form-container mb-4">
                            <div class="d-flex align-items-start gap-3">
                                <div class="avatar-placeholder bg-primary rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                                    style="width: 45px; height: 45px;">
                                    👤
                                </div>
                                <div class="flex-grow-1">
                                    <form class="comment-form">
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control rounded-3" id="comment-textarea" style="height: 120px; resize: none;"
                                                placeholder="Bagikan pemikiran Anda tentang topik ini..." disabled></textarea>
                                            <label for="comment-textarea">Tulis komentar Anda...</label>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="comment-tools d-flex gap-2">
                                                <button type="button" class="btn btn-light btn-sm rounded-pill" disabled>
                                                    <i class="mdi mdi-emoticon-outline"></i>
                                                </button>
                                                <button type="button" class="btn btn-light btn-sm rounded-pill" disabled>
                                                    <i class="mdi mdi-image-outline"></i>
                                                </button>
                                                <button type="button" class="btn btn-light btn-sm rounded-pill" disabled>
                                                    <i class="mdi mdi-link-variant"></i>
                                                </button>
                                            </div>
                                            <button type="submit" class="btn btn-primary rounded-pill px-4" disabled>
                                                <i class="mdi mdi-send-outline me-2"></i>
                                                Kirim Komentar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Empty State --}}
                        <div class="empty-state text-center py-5">
                            <div class="mb-4">
                                <i class="mdi mdi-message-text-outline" style="font-size: 80px; color: #e9ecef;"></i>
                            </div>
                            <h5 class="text-muted mb-3">Belum Ada Diskusi</h5>
                            <p class="text-muted mb-4">
                                Jadilah yang pertama memulai diskusi tentang topik ini! 🌱<br>
                                Bagikan pengalaman, pertanyaan, atau tips Anda.
                            </p>
                            <div class="alert alert-info rounded-3 d-inline-block">
                                <i class="mdi mdi-information-outline me-2"></i>
                                <strong>Info:</strong> Diskusi hanya tersedia untuk pengguna yang sudah login
                            </div>
                        </div>

                        {{-- Sample Comments (Hidden by default) --}}
                        <div class="comments-list d-none">
                            <div class="comment-item border-bottom py-4">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="avatar-placeholder bg-success rounded-circle d-flex align-items-center justify-content-center text-white fw-bold"
                                        style="width: 40px; height: 40px;">
                                        P
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="comment-header d-flex align-items-center gap-2 mb-2">
                                            <span class="fw-semibold">Petani123</span>
                                            <span class="badge bg-success bg-opacity-10 text-success">Petani
                                                Berpengalaman</span>
                                            <span class="text-muted small">2 jam yang lalu</span>
                                        </div>
                                        <p class="comment-text mb-2">
                                            Informasi yang sangat bermanfaat! Saya sudah menerapkan tips ini di kebun saya
                                            dan hasilnya luar biasa.
                                        </p>
                                        <div class="comment-actions d-flex gap-3">
                                            <button class="btn btn-link btn-sm p-0 text-muted">
                                                <i class="mdi mdi-thumb-up-outline me-1"></i>
                                                Suka (5)
                                            </button>
                                            <button class="btn btn-link btn-sm p-0 text-muted">
                                                <i class="mdi mdi-reply me-1"></i>
                                                Balas
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Back Button --}}
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('informasi.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                        <i class="mdi mdi-arrow-left me-2"></i>
                        Kembali ke Forum
                    </a>
                    <button class="btn btn-primary rounded-pill px-4 py-2" onclick="window.scrollTo(0,0)">
                        <i class="mdi mdi-arrow-up me-2"></i>
                        Ke Atas
                    </button>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4 col-xl-3">
                {{-- Quick Stats --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-0 pb-0">
                        <h6 class="fw-bold">📊 Statistik Topik</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 text-center">
                            <div class="col-4">
                                <div class="stat-item">
                                    <div class="stat-number text-primary fw-bold">0</div>
                                    <div class="stat-label small text-muted">Komentar</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <div class="stat-number text-success fw-bold">0</div>
                                    <div class="stat-label small text-muted">Suka</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <div class="stat-number text-info fw-bold">1</div>
                                    <div class="stat-label small text-muted">Dilihat</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Related Topics --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-0 pb-0">
                        <h6 class="fw-bold">🔗 Topik Terkait</h6>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush">
                            <div class="text-center text-muted py-3">
                                <i class="mdi mdi-link-variant-off mb-2" style="font-size: 2rem;"></i>
                                <div>Belum ada topik terkait</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Forum Guidelines --}}
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white border-0 pb-0">
                        <h6 class="fw-bold">📋 Panduan Forum</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-2">
                                <i class="mdi mdi-check-circle text-success me-2"></i>
                                Gunakan bahasa yang sopan dan hormat
                            </li>
                            <li class="mb-2">
                                <i class="mdi mdi-check-circle text-success me-2"></i>
                                Berbagi pengalaman yang bermanfaat
                            </li>
                            <li class="mb-2">
                                <i class="mdi mdi-check-circle text-success me-2"></i>
                                Hindari konten yang tidak relevan
                            </li>
                            <li>
                                <i class="mdi mdi-check-circle text-success me-2"></i>
                                Hormati pendapat sesama petani
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Custom Styles --}}
    <style>
        /* Category Gradients */
        .category-hama {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
        }

        .category-penyakit {
            background: linear-gradient(135deg, #ffa502, #ff6348);
        }

        .category-tips {
            background: linear-gradient(135deg, #26de81, #20bf6b);
        }

        .category-cuaca {
            background: linear-gradient(135deg, #3742fa, #2f3542);
        }

        .category-default {
            background: linear-gradient(135deg, #a4b0be, #747d8c);
        }

        /* Category Icons */
        .category-icon {
            font-size: 2rem;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        }

        /* Content Styling */
        .content-text {
            text-align: justify;
            color: #2d3436;
        }

        /* Avatar Placeholder */
        .avatar-placeholder {
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        /* Comment Form */
        .comment-form-container {
            background: linear-gradient(145deg, #f8f9fa, #e9ecef);
            border-radius: 1rem;
            padding: 1.5rem;
        }

        /* Hover Effects */
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Card Hover */
        .card:hover {
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }

        /* Stat Items */
        .stat-item {
            padding: 0.5rem;
        }

        .stat-number {
            font-size: 1.5rem;
            line-height: 1;
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container-fluid {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .display-6 {
                font-size: 1.5rem;
            }

            .comment-form-container {
                padding: 1rem;
            }
        }

        /* Loading Animation */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }
    </style>

    {{-- JavaScript for Interactions --}}
    <script>
        function likePost() {
            const likeBtn = document.querySelector('#like-count');
            const currentCount = parseInt(likeBtn.textContent.match(/\d+/)[0]);
            likeBtn.innerHTML = `Suka (${currentCount + 1})`;

            // Add visual feedback
            const btn = likeBtn.closest('.btn');
            btn.classList.add('btn-primary');
            btn.classList.remove('btn-outline-primary');
        }

        function bookmarkPost() {
            const btn = event.target.closest('.btn');
            btn.classList.toggle('btn-success');
            btn.classList.toggle('btn-outline-success');

            const icon = btn.querySelector('i');
            icon.classList.toggle('mdi-bookmark-outline');
            icon.classList.toggle('mdi-bookmark');
        }

        function sharePost() {
            if (navigator.share) {
                navigator.share({
                    title: '{{ $info->judul }}',
                    url: window.location.href
                });
            } else {
                navigator.clipboard.writeText(window.location.href);
                alert('Link telah disalin ke clipboard!');
            }
        }

        function scrollToComments() {
            document.getElementById('discussion-section').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        // Auto-resize textarea
        document.addEventListener('DOMContentLoaded', function() {
            const textarea = document.getElementById('comment-textarea');
            if (textarea) {
                textarea.addEventListener('input', function() {
                    this.style.height = 'auto';
                    this.style.height = (this.scrollHeight) + 'px';
                });
            }
        });
    </script>
@endsection
