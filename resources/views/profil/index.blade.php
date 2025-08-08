@extends('layouts.app')

@section('title', 'Profile Admin')

@section('content')
    <div class="container-fluid px-4">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-3">
                    <div>
                        <h2 class="fw-bold mb-1 text-dark">Profile Admin</h2>
                        <p class="text-muted mb-0">Kelola informasi akun administrator</p>
                    </div>
                    <button class="btn btn-primary px-4 py-2 rounded-3">
                        <i class="fas fa-edit me-2"></i>Edit Profile
                    </button>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Profile Section -->
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-5">
                        <div class="row align-items-center">
                            <!-- Avatar & Basic Info -->
                            <div class="col-lg-4 text-center text-lg-start">
                                <div class="position-relative d-inline-block mb-3">
                                    <div class="avatar-container position-relative">
                                        <div class="text-center mb-4">
                                            <img src="{{ asset('assets/images/faces/profil.png') }}" alt="Foto Profil"
                                                class="rounded-circle shadow"
                                                style="width: 120px; height: 120px; object-fit: cover;">
                                        </div>
                                        <div class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-3 border-white"
                                            style="width: 24px; height: 24px;"></div>
                                    </div>
                                </div>
                                <h3 class="fw-bold mb-1">Admin Sistem</h3>
                                <p class="text-muted mb-2">admin@gmail.com</p>
                                <div class="d-flex justify-content-center justify-content-lg-start gap-2 mb-3">
                                    <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                                        <i class="fas fa-shield-alt me-1"></i>Administrator
                                    </span>
                                    <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                                        <i class="fas fa-circle me-1" style="font-size: 8px;"></i>Aktif
                                    </span>
                                </div>
                            </div>

                            <!-- Quick Stats -->
                            <div class="col-lg-8">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="stats-card bg-primary-subtle rounded-3 p-3 text-center">
                                            <div class="stats-icon text-primary mb-2">
                                                <i class="fas fa-calendar-alt" style="font-size: 1.5rem;"></i>
                                            </div>
                                            <h4 class="fw-bold text-primary mb-0">2.5</h4>
                                            <small class="text-muted">Tahun Bergabung</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="stats-card bg-success-subtle rounded-3 p-3 text-center">
                                            <div class="stats-icon text-success mb-2">
                                                <i class="fas fa-chart-line" style="font-size: 1.5rem;"></i>
                                            </div>
                                            <h4 class="fw-bold text-success mb-0">1,234</h4>
                                            <small class="text-muted">Total Aktivitas</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="stats-card bg-warning-subtle rounded-3 p-3 text-center">
                                            <div class="stats-icon text-warning mb-2">
                                                <i class="fas fa-server" style="font-size: 1.5rem;"></i>
                                            </div>
                                            <h4 class="fw-bold text-warning mb-0">98%</h4>
                                            <small class="text-muted">System Uptime</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Information Cards -->
            <div class="col-12">
                <div class="row g-4">
                    <!-- Personal Information -->
                    <div class="col-lg-8">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-header bg-primary text-white rounded-top-4 py-3">
                                <h5 class="mb-0 fw-semibold">
                                    <i class="fas fa-user me-2"></i>Informasi Personal
                                </h5>
                            </div>
                            <div class="card-body p-4">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="info-group">
                                            <label class="form-label text-muted small fw-semibold mb-1">Nama Lengkap</label>
                                            <p class="fw-bold text-dark mb-0">Admin Sistem Aplikasi</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-group">
                                            <label class="form-label text-muted small fw-semibold mb-1">Email</label>
                                            <p class="text-dark mb-0">admin@gmail.com</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-group">
                                            <label class="form-label text-muted small fw-semibold mb-1">Username</label>
                                            <p class="text-dark mb-0">admin_sistem</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-group">
                                            <label class="form-label text-muted small fw-semibold mb-1">No. Telepon</label>
                                            <p class="text-dark mb-0">+62 812-3456-7890</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="info-group">
                                            <label class="form-label text-muted small fw-semibold mb-1">Alamat</label>
                                            <p class="text-dark mb-0">Jl. Teknologi No. 123, Jakarta Selatan, DKI Jakarta
                                                12345</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Account & Stats -->
                    <div class="col-lg-4">
                        <div class="row g-4 h-100">
                            <!-- Account Details -->
                            <div class="col-12">
                                <div class="card border-0 shadow-sm rounded-4">
                                    <div class="card-header bg-light border-0 rounded-top-4 py-3">
                                        <h6 class="mb-0 fw-semibold text-dark">
                                            <i class="fas fa-cog me-2"></i>Detail Akun
                                        </h6>
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="detail-item d-flex justify-content-between align-items-center mb-3">
                                            <span class="text-muted">Bergabung Sejak</span>
                                            <span class="fw-semibold text-dark">15 Januari 2022</span>
                                        </div>
                                        <div class="detail-item d-flex justify-content-between align-items-center mb-3">
                                            <span class="text-muted">Last Login</span>
                                            <span class="fw-semibold text-dark">Hari ini, 14:30</span>
                                        </div>
                                        <div class="detail-item d-flex justify-content-between align-items-center mb-3">
                                            <span class="text-muted">Role</span>
                                            <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">Super
                                                Admin</span>
                                        </div>
                                        <div class="detail-item d-flex justify-content-between align-items-center">
                                            <span class="text-muted">Status</span>
                                            <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                                                <i class="fas fa-circle me-1" style="font-size: 8px;"></i>Online
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Stats -->
                            <div class="col-12">
                                <div class="card border-0 shadow-sm rounded-4">
                                    <div class="card-header bg-light border-0 rounded-top-4 py-3">
                                        <h6 class="mb-0 fw-semibold text-dark">
                                            <i class="fas fa-chart-pie me-2"></i>Statistik Cepat
                                        </h6>
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="detail-item d-flex justify-content-between align-items-center mb-3">
                                            <span class="text-muted">Login Bulan Ini</span>
                                            <span class="fw-bold text-primary">45 kali</span>
                                        </div>
                                        <div class="detail-item d-flex justify-content-between align-items-center mb-3">
                                            <span class="text-muted">Perubahan Data</span>
                                            <span class="fw-bold text-success">128 kali</span>
                                        </div>
                                        <div class="detail-item d-flex justify-content-between align-items-center mb-3">
                                            <span class="text-muted">Backup Terakhir</span>
                                            <span class="fw-semibold text-dark">2 jam lalu</span>
                                        </div>
                                        <div class="detail-item d-flex justify-content-between align-items-center">
                                            <span class="text-muted">Security Score</span>
                                            <div class="d-flex align-items-center">
                                                <span class="fw-bold text-success me-2">Excellent</span>
                                                <i class="fas fa-shield-check text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <div class="d-flex flex-wrap justify-content-center gap-3">
                            <button class="btn btn-outline-primary rounded-pill px-4 py-2 btn-action">
                                <i class="fas fa-key me-2"></i>Ganti Password
                            </button>
                            <button class="btn btn-outline-success rounded-pill px-4 py-2 btn-action">
                                <i class="fas fa-shield-alt me-2"></i>Security Settings
                            </button>
                            <button class="btn btn-outline-info rounded-pill px-4 py-2 btn-action">
                                <i class="fas fa-download me-2"></i>Export Data
                            </button>
                            <button class="btn btn-outline-warning rounded-pill px-4 py-2 btn-action">
                                <i class="fas fa-history me-2"></i>Activity Log
                            </button>
                            <button class="btn btn-outline-danger rounded-pill px-4 py-2 btn-action">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .container-fluid {
            max-width: 100%;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .card {
            transition: all 0.3s ease;
            border: none !important;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }

        .avatar-container {
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
        }

        .stats-card {
            transition: all 0.3s ease;
        }

        .stats-card:hover {
            transform: scale(1.05);
        }

        .info-group {
            padding: 1rem 0;
            border-bottom: 1px solid #f8f9fa;
        }

        .info-group:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .detail-item {
            padding: 0.5rem 0;
        }

        .btn-action {
            transition: all 0.3s ease;
            border-width: 2px;
            font-weight: 500;
        }

        .btn-action:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .badge {
            font-size: 0.75rem;
            font-weight: 500;
        }

        .bg-primary-subtle {
            background-color: rgba(13, 110, 253, 0.1) !important;
        }

        .bg-success-subtle {
            background-color: rgba(25, 135, 84, 0.1) !important;
        }

        .bg-warning-subtle {
            background-color: rgba(255, 193, 7, 0.1) !important;
        }

        .bg-danger-subtle {
            background-color: rgba(220, 53, 69, 0.1) !important;
        }

        .text-primary {
            color: #0d6efd !important;
        }

        .text-success {
            color: #198754 !important;
        }

        .text-warning {
            color: #ffc107 !important;
        }

        .text-danger {
            color: #dc3545 !important;
        }

        @media (max-width: 768px) {
            .container-fluid {
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }

            .card-body {
                padding: 1.5rem !important;
            }

            .btn-action {
                width: 100%;
                margin-bottom: 0.5rem;
            }
        }
    </style>
@endsection
