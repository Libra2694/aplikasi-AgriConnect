@extends('layouts.app')

@section('content')
<style>
    .financial-services {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 2rem 0;
    }

    .main-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        border: none;
        backdrop-filter: blur(10px);
    }

    .card-header-custom {
        background: linear-gradient(135deg, #00d4aa, #00b4d8);
        color: white;
        padding: 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .card-header-custom::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: repeating-linear-gradient(
            45deg,
            transparent,
            transparent 10px,
            rgba(255, 255, 255, 0.1) 10px,
            rgba(255, 255, 255, 0.1) 20px
        );
        animation: slide 20s linear infinite;
    }

    @keyframes slide {
        0% { transform: translateX(-100px) translateY(-100px); }
        100% { transform: translateX(100px) translateY(100px); }
    }

    .card-header-custom h4 {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 1;
        font-weight: 700;
    }

    .card-header-custom .subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        position: relative;
        z-index: 1;
    }

    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin: 2rem 0;
    }

    .stat-card {
        background: white;
        padding: 1.5rem;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4);
        animation: colorShift 3s ease-in-out infinite;
    }

    @keyframes colorShift {
        0%, 100% { background: linear-gradient(45deg, #ff6b6b, #4ecdc4); }
        50% { background: linear-gradient(45deg, #45b7d1, #96ceb4); }
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: #666;
        font-size: 0.9rem;
    }

    .service-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
        border: none;
        height: 100%;
    }

    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(255, 107, 107, 0.05), rgba(78, 205, 196, 0.05));
        opacity: 0;
        transition: opacity 0.3s;
    }

    .service-card:hover::before {
        opacity: 1;
    }

    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    .service-icon {
        width: 80px;
        height: 80px;
        border-radius: 20px;
        background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        font-size: 2rem;
        color: white;
        margin-left: auto;
        margin-right: auto;
    }

    .service-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 1rem;
        text-align: center;
    }

    .service-description {
        color: #666;
        line-height: 1.6;
        margin-bottom: 2rem;
        text-align: center;
    }

    .btn-custom {
        background: linear-gradient(45deg, #667eea, #764ba2);
        color: white;
        border: none;
        padding: 1rem 2rem;
        border-radius: 25px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        width: 100%;
        position: relative;
        overflow: hidden;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    .btn-custom::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn-custom:hover::before {
        left: 100%;
    }

    .btn-custom:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        color: white;
        text-decoration: none;
    }

    .floating-elements {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
    }

    .floating-element {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }

    .floating-element:nth-child(1) {
        width: 80px;
        height: 80px;
        top: 10%;
        left: 10%;
        animation-delay: 0s;
    }

    .floating-element:nth-child(2) {
        width: 60px;
        height: 60px;
        top: 20%;
        right: 10%;
        animation-delay: 2s;
    }

    .floating-element:nth-child(3) {
        width: 40px;
        height: 40px;
        bottom: 20%;
        left: 20%;
        animation-delay: 4s;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .intro-text {
        font-size: 1.2rem;
        color: #666;
        text-align: center;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .section-divider {
        height: 4px;
        background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4);
        border-radius: 2px;
        margin: 2rem 0;
        animation: colorShift 3s ease-in-out infinite;
    }

    @media (max-width: 768px) {
        .card-header-custom h4 {
            font-size: 2rem;
        }
        
        .stats-container {
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
        
        .features-grid {
            grid-template-columns: 1fr;
        }
        
        .service-card {
            padding: 1.5rem;
        }
    }
</style>

<div class="financial-services">
    <div class="floating-elements">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
    </div>

    <div class="container">
        <div class="card main-card">
            <div class="card-header-custom">
                <h4 class="mb-0">Layanan Keuangan</h4>
                <p class="subtitle">Solusi finansial terdepan untuk mengembangkan bisnis pertanian Anda</p>
            </div>
            
            <div class="card-body" style="padding: 2rem;">
                <!-- Statistics Section -->
                <div class="stats-container">
                    <div class="stat-card">
                        <div class="stat-number" data-target="2500">0</div>
                        <div class="stat-label">Pengguna Aktif</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number" data-target="15.8">0</div>
                        <div class="stat-label">Total Pinjaman (M)</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number" data-target="98">0</div>
                        <div class="stat-label">Tingkat Kepuasan (%)</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Dukungan Pelanggan</div>
                    </div>
                </div>

                <div class="section-divider"></div>

                <p class="intro-text">
                    Dapatkan akses ke berbagai layanan keuangan yang dirancang khusus untuk mendukung 
                    pertumbuhan dan keberlanjutan bisnis pertanian Anda.
                </p>
                
                <div class="features-grid">
                    <!-- Fitur 1: Pinjaman Modal -->
                    <div class="service-card">
                        <div class="service-icon">💰</div>
                        <h5 class="service-title">Pinjaman Modal</h5>
                        <p class="service-description">
                            Ajukan pinjaman modal usaha untuk mendukung pertumbuhan bisnis pertanianmu 
                            dengan suku bunga kompetitif dan proses yang mudah.
                        </p>
                        <a href="{{ route('pinjaman.index') }}" class="btn-custom">
                            Ajukan Pinjaman
                        </a>
                    </div>

                    <!-- Fitur 2: Asuransi Pertanian -->
                    <div class="service-card">
                        <div class="service-icon">🛡️</div>
                        <h5 class="service-title">Asuransi Pertanian</h5>
                        <p class="service-description">
                            Lindungi hasil panenmu dari risiko cuaca ekstrim dan gagal panen 
                            dengan asuransi yang terpercaya dan terjangkau.
                        </p>
                        <a href="{{ route('asuransi.index') }}" class="btn-custom">
                            Lihat Asuransi
                        </a>
                    </div>

                    <!-- Fitur Tambahan 1: Konsultasi Keuangan -->
                    <div class="service-card">
                        <div class="service-icon">📊</div>
                        <h5 class="service-title">Konsultasi Keuangan</h5>
                        <p class="service-description">
                            Dapatkan saran ahli untuk mengelola keuangan bisnis pertanian 
                            dan merencanakan investasi yang tepat.
                        </p>
                        <a href="#" class="btn-custom">
                            Konsultasi Sekarang
                        </a>
                    </div>

                    <!-- Fitur Tambahan 2: Investasi Pertanian -->
                    <div class="service-card">
                        <div class="service-icon">📈</div>
                        <h5 class="service-title">Investasi Pertanian</h5>
                        <p class="service-description">
                            Investasikan dana Anda dalam proyek pertanian yang menguntungkan 
                            dengan tingkat return yang menarik.
                        </p>
                        <a href="#" class="btn-custom">
                            Mulai Investasi
                        </a>
                    </div>
                </div>

                <div class="section-divider"></div>

                <!-- Call to Action -->
                <div class="text-center mt-4">
                    <h5 style="color: #333; margin-bottom: 1rem;">Siap untuk memulai?</h5>
                    <p style="color: #666; margin-bottom: 2rem;">
                        Hubungi tim kami untuk mendapatkan konsultasi gratis mengenai layanan keuangan 
                        yang paling sesuai dengan kebutuhan bisnis Anda.
                    </p>
                    <a href="#" class="btn-custom" style="max-width: 300px;">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animated counter for stats
    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 100;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                if (target === 15.8) {
                    element.textContent = target.toFixed(1);
                } else {
                    element.textContent = Math.floor(target).toLocaleString();
                }
                clearInterval(timer);
            } else {
                if (target === 15.8) {
                    element.textContent = current.toFixed(1);
                } else {
                    element.textContent = Math.floor(current).toLocaleString();
                }
            }
        }, 30);
    }

    // Initialize counters
    const statNumbers = document.querySelectorAll('.stat-number[data-target]');
    statNumbers.forEach((stat, index) => {
        const target = parseFloat(stat.getAttribute('data-target'));
        setTimeout(() => {
            animateCounter(stat, target);
        }, index * 200);
    });

    // Add button click animations
    document.querySelectorAll('.btn-custom').forEach(btn => {
        btn.addEventListener('click', function(e) {
            // Create ripple effect
            const ripple = document.createElement('div');
            ripple.style.position = 'absolute';
            ripple.style.background = 'rgba(255, 255, 255, 0.6)';
            ripple.style.borderRadius = '50%';
            ripple.style.pointerEvents = 'none';
            ripple.style.width = '100px';
            ripple.style.height = '100px';
            ripple.style.left = (e.clientX - this.offsetLeft - 50) + 'px';
            ripple.style.top = (e.clientY - this.offsetTop - 50) + 'px';
            ripple.style.animation = 'ripple 0.6s ease-out';
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    // Add CSS for ripple animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            0% {
                transform: scale(0);
                opacity: 1;
            }
            100% {
                transform: scale(2);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
});
</script>
@endsection