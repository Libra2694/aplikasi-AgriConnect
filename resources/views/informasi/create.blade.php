@extends('layouts.app')

@section('title', 'Tambah Informasi Petani')

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
                <li class="breadcrumb-item active text-muted">Tambah Informasi Baru</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-10">
                {{-- Hero Section --}}
                <div class="text-center mb-5">
                    <div class="bg-gradient-primary rounded-5 p-4 d-inline-block mb-4">
                        <i class="mdi mdi-pencil-plus text-white" style="font-size: 3rem;"></i>
                    </div>
                    <h2 class="display-6 fw-bold mb-3">Buat Informasi Baru</h2>
                    <p class="lead text-muted mb-0">
                        Bagikan pengetahuan dan pengalaman Anda dengan komunitas petani 🌱
                    </p>
                </div>

                {{-- Main Form Card --}}
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-4">
                    {{-- Form Header --}}
                    <div class="bg-gradient-primary text-white p-4">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-file-document-edit-outline me-3" style="font-size: 1.5rem;"></i>
                            <div>
                                <h5 class="mb-1 fw-bold">Form Informasi Petani</h5>
                                <small class="opacity-90">Lengkapi semua field untuk membuat informasi baru</small>
                            </div>
                        </div>
                    </div>

                    {{-- Form Body --}}
                    <div class="card-body p-5">
                        <form action="{{ route('informasi.store') }}" method="POST" id="create-form">
                            @csrf

                            <div class="row">
                                {{-- Left Column --}}
                                <div class="col-lg-8">
                                    {{-- Title Field --}}
                                    <div class="form-floating mb-4">
                                        <input type="text" name="judul" id="judul"
                                            class="form-control form-control-lg rounded-3"
                                            placeholder="Masukkan judul informasi..." required>
                                        <label for="judul">
                                            <i class="mdi mdi-format-title me-2"></i>
                                            Judul Informasi
                                        </label>
                                        <div class="form-text">
                                            <small class="text-muted">Buat judul yang menarik dan deskriptif</small>
                                        </div>
                                    </div>

                                    {{-- Content Field --}}
                                    <div class="mb-4">
                                        <label for="konten" class="form-label fw-semibold mb-3">
                                            <i class="mdi mdi-text me-2 text-primary"></i>
                                            Konten Informasi
                                        </label>
                                        <div class="content-editor-wrapper">
                                            <div class="editor-toolbar bg-light rounded-top p-3 border">
                                                <div class="d-flex gap-2 flex-wrap">
                                                    <button type="button" class="btn btn-outline-secondary btn-sm"
                                                        onclick="formatText('bold')" title="Tebal">
                                                        <i class="mdi mdi-format-bold"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-secondary btn-sm"
                                                        onclick="formatText('italic')" title="Miring">
                                                        <i class="mdi mdi-format-italic"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-secondary btn-sm"
                                                        onclick="formatText('underline')" title="Garis bawah">
                                                        <i class="mdi mdi-format-underline"></i>
                                                    </button>
                                                    <div class="vr"></div>
                                                    <button type="button" class="btn btn-outline-secondary btn-sm"
                                                        onclick="insertList()" title="Daftar">
                                                        <i class="mdi mdi-format-list-bulleted"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-secondary btn-sm"
                                                        onclick="insertEmoji()" title="Emoji">
                                                        <i class="mdi mdi-emoticon-outline"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <textarea name="konten" id="konten" rows="12" class="form-control rounded-bottom"
                                                style="border-top: 0; resize: vertical; min-height: 300px;"
                                                placeholder="Tulis konten informasi Anda di sini...

Tips menulis konten yang baik:
• Gunakan bahasa yang mudah dipahami
• Berikan contoh konkret dari pengalaman
• Sertakan langkah-langkah yang jelas
• Tambahkan tips atau saran praktis"
                                                required></textarea>
                                        </div>
                                        <div class="form-text d-flex justify-content-between">
                                            <small class="text-muted">Jelaskan informasi dengan detail dan mudah
                                                dipahami</small>
                                            <small class="text-muted">
                                                <span id="char-count">0</span> karakter
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                {{-- Right Column --}}
                                <div class="col-lg-4">
                                    {{-- Category Selection --}}
                                    <div class="mb-4">
                                        <label for="kategori" class="form-label fw-semibold mb-3">
                                            <i class="mdi mdi-tag me-2 text-primary"></i>
                                            Kategori
                                        </label>
                                        <div class="category-selector">
                                            <div class="row g-2">
                                                <div class="col-6">
                                                    <input type="radio" name="kategori" value="Hama" id="cat-hama"
                                                        class="btn-check" required>
                                                    <label class="btn btn-outline-danger w-100 rounded-3 p-3"
                                                        for="cat-hama">
                                                        <div class="category-icon mb-2">🐛</div>
                                                        <div class="small fw-semibold">Hama</div>
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" name="kategori" value="Penyakit"
                                                        id="cat-penyakit" class="btn-check" required>
                                                    <label class="btn btn-outline-warning w-100 rounded-3 p-3"
                                                        for="cat-penyakit">
                                                        <div class="category-icon mb-2">🦠</div>
                                                        <div class="small fw-semibold">Penyakit</div>
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" name="kategori" value="Tips" id="cat-tips"
                                                        class="btn-check" required>
                                                    <label class="btn btn-outline-success w-100 rounded-3 p-3"
                                                        for="cat-tips">
                                                        <div class="category-icon mb-2">💡</div>
                                                        <div class="small fw-semibold">Tips</div>
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" name="kategori" value="Cuaca" id="cat-cuaca"
                                                        class="btn-check" required>
                                                    <label class="btn btn-outline-info w-100 rounded-3 p-3"
                                                        for="cat-cuaca">
                                                        <div class="category-icon mb-2">🌤️</div>
                                                        <div class="small fw-semibold">Cuaca</div>
                                                    </label>
                                                </div>
                                                <div class="col-12">
                                                    <input type="radio" name="kategori" value="Lainnya"
                                                        id="cat-lainnya" class="btn-check" required>
                                                    <label class="btn btn-outline-secondary w-100 rounded-3 p-3"
                                                        for="cat-lainnya">
                                                        <div class="category-icon mb-2">📋</div>
                                                        <div class="small fw-semibold">Lainnya</div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Date Field --}}
                                    <div class="mb-4">
                                        <label for="tanggal_terbit" class="form-label fw-semibold mb-3">
                                            <i class="mdi mdi-calendar me-2 text-primary"></i>
                                            Tanggal Terbit
                                        </label>
                                        <div class="form-floating">
                                            <input type="date" name="tanggal_terbit" id="tanggal_terbit"
                                                class="form-control rounded-3" value="{{ date('Y-m-d') }}" required>
                                            <label for="tanggal_terbit">Pilih tanggal</label>
                                        </div>
                                        <div class="form-text">
                                            <small class="text-muted">Default: hari ini</small>
                                        </div>
                                    </div>

                                    {{-- Writing Tips Card --}}
                                    <div class="card bg-light border-0 rounded-3">
                                        <div class="card-body p-3">
                                            <h6 class="fw-bold text-primary mb-3">
                                                <i class="mdi mdi-lightbulb-outline me-2"></i>
                                                Tips Menulis
                                            </h6>
                                            <ul class="list-unstyled small mb-0">
                                                <li class="mb-2">
                                                    <i class="mdi mdi-check-circle text-success me-2"></i>
                                                    Gunakan judul yang menarik
                                                </li>
                                                <li class="mb-2">
                                                    <i class="mdi mdi-check-circle text-success me-2"></i>
                                                    Sertakan pengalaman pribadi
                                                </li>
                                                <li class="mb-2">
                                                    <i class="mdi mdi-check-circle text-success me-2"></i>
                                                    Berikan solusi praktis
                                                </li>
                                                <li>
                                                    <i class="mdi mdi-check-circle text-success me-2"></i>
                                                    Gunakan bahasa sederhana
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Form Actions --}}
                            <div class="border-top pt-4 mt-4">
                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="agree-terms" required>
                                        <label class="form-check-label small text-muted" for="agree-terms">
                                            Saya setuju bahwa informasi ini akurat dan bermanfaat untuk komunitas petani
                                        </label>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('informasi.index') }}"
                                            class="btn btn-outline-secondary rounded-pill px-4 py-2">
                                            <i class="mdi mdi-arrow-left me-2"></i>
                                            Kembali
                                        </a>
                                        <button type="button" class="btn btn-outline-primary rounded-pill px-4 py-2"
                                            onclick="previewContent()">
                                            <i class="mdi mdi-eye-outline me-2"></i>
                                            Preview
                                        </button>
                                        <button type="submit" class="btn btn-primary rounded-pill px-5 py-2"
                                            id="submit-btn">
                                            <i class="mdi mdi-content-save me-2"></i>
                                            Publikasikan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Preview Modal --}}
                <div class="modal fade" id="preview-modal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content rounded-4">
                            <div class="modal-header border-0 bg-primary text-white">
                                <h5 class="modal-title">
                                    <i class="mdi mdi-eye-outline me-2"></i>
                                    Preview Informasi
                                </h5>
                                <button type="button" class="btn-close btn-close-white"
                                    data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body p-4">
                                <div id="preview-content">
                                    <!-- Preview content will be inserted here -->
                                </div>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Tutup Preview
                                </button>
                                <button type="button" class="btn btn-primary" onclick="submitForm()">
                                    Lanjut Publikasikan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Custom Styles --}}
    <style>
        /* Gradient backgrounds */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        /* Category selector styling */
        .category-selector .btn-check:checked+.btn {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .category-icon {
            font-size: 1.5rem;
        }

        /* Form enhancements */
        .form-floating>label {
            padding-left: 2.5rem;
        }

        .form-floating>.form-control {
            padding-left: 2.5rem;
        }

        /* Editor toolbar */
        .editor-toolbar {
            border-bottom: 1px solid #dee2e6;
        }

        .editor-toolbar .btn {
            border: none;
            margin: 0;
        }

        .editor-toolbar .btn:hover {
            background-color: #e9ecef;
            transform: none;
        }

        /* Content wrapper */
        .content-editor-wrapper {
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            overflow: hidden;
        }

        /* Hover effects */
        .btn:hover:not(.btn-check:checked + .btn) {
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }

        /* Character counter */
        #char-count {
            font-weight: 600;
        }

        /* Loading state */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        .loading .btn {
            position: relative;
        }

        .loading .btn::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            margin: auto;
            border: 2px solid transparent;
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container-fluid {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .card-body {
                padding: 2rem !important;
            }

            .category-selector .col-6 {
                margin-bottom: 0.5rem;
            }
        }
    </style>

    {{-- JavaScript for Enhanced Functionality --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Character counter
            const kontenTextarea = document.getElementById('konten');
            const charCount = document.getElementById('char-count');

            kontenTextarea.addEventListener('input', function() {
                charCount.textContent = this.value.length;

                // Color coding based on length
                if (this.value.length < 100) {
                    charCount.className = 'text-danger';
                } else if (this.value.length < 500) {
                    charCount.className = 'text-warning';
                } else {
                    charCount.className = 'text-success';
                }
            });

            // Auto-resize textarea
            kontenTextarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });

            // Form validation feedback
            const form = document.getElementById('create-form');
            form.addEventListener('submit', function(e) {
                if (!form.checkValidity()) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                form.classList.add('was-validated');

                // Show loading state
                const submitBtn = document.getElementById('submit-btn');
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;
            });
        });

        // Text formatting functions
        function formatText(command) {
            const textarea = document.getElementById('konten');
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const selectedText = textarea.value.substring(start, end);

            if (selectedText) {
                let formattedText = selectedText;
                switch (command) {
                    case 'bold':
                        formattedText = `**${selectedText}**`;
                        break;
                    case 'italic':
                        formattedText = `*${selectedText}*`;
                        break;
                    case 'underline':
                        formattedText = `_${selectedText}_`;
                        break;
                }

                textarea.value = textarea.value.substring(0, start) + formattedText + textarea.value.substring(end);
                textarea.focus();
            }
        }

        function insertList() {
            const textarea = document.getElementById('konten');
            const cursorPos = textarea.selectionStart;
            const textBefore = textarea.value.substring(0, cursorPos);
            const textAfter = textarea.value.substring(cursorPos);

            textarea.value = textBefore + '\n• Item 1\n• Item 2\n• Item 3\n' + textAfter;
            textarea.focus();
        }

        function insertEmoji() {
            const emojis = ['🌱', '🌾', '🚜', '🌧️', '☀️', '🐛', '🦠', '💡', '✨', '👨‍🌾'];
            const randomEmoji = emojis[Math.floor(Math.random() * emojis.length)];

            const textarea = document.getElementById('konten');
            const cursorPos = textarea.selectionStart;
            const textBefore = textarea.value.substring(0, cursorPos);
            const textAfter = textarea.value.substring(cursorPos);

            textarea.value = textBefore + randomEmoji + ' ' + textAfter;
            textarea.focus();
        }

        // Preview functionality
        function previewContent() {
            const judul = document.getElementById('judul').value;
            const konten = document.getElementById('konten').value;
            const kategori = document.querySelector('input[name="kategori"]:checked')?.value || 'Tidak dipilih';
            const tanggal = document.getElementById('tanggal_terbit').value;

            if (!judul || !konten) {
                alert('Mohon isi judul dan konten terlebih dahulu');
                return;
            }

            const categoryIcons = {
                'Hama': '🐛',
                'Penyakit': '🦠',
                'Tips': '💡',
                'Cuaca': '🌤️',
                'Lainnya': '📋'
            };

            const previewContent = `
                <div class="preview-header mb-4 p-3 bg-light rounded-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4 class="fw-bold mb-0">${judul}</h4>
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            ${categoryIcons[kategori] || '📋'} ${kategori}
                        </span>
                    </div>
                    <small class="text-muted">
                        <i class="mdi mdi-calendar me-1"></i>
                        ${new Date(tanggal).toLocaleDateString('id-ID', { 
                            year: 'numeric', 
                            month: 'long', 
                            day: 'numeric' 
                        })}
                    </small>
                </div>
                <div class="preview-body">
                    <div style="white-space: pre-wrap; line-height: 1.7;">${konten}</div>
                </div>
            `;

            document.getElementById('preview-content').innerHTML = previewContent;

            // Show modal (assuming Bootstrap 5)
            const modal = new bootstrap.Modal(document.getElementById('preview-modal'));
            modal.show();
        }

        function submitForm() {
            document.getElementById('create-form').submit();
        }
    </script>
@endsection
