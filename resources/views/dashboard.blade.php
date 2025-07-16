@extends('layouts.app')

@section('content')
    <div class="page-header d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0">Dashboard</h3>
            <p class="text-muted">Selamat datang di Agriconnect, solusi pertanian modern Anda 🌾</p>
        </div>
    </div>

    {{-- Info Cards --}}
    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-1">Petani Terdaftar</h6>
                        <h3 class="fw-bold">342</h3>
                    </div>
                    <i class="mdi mdi-account mdi-48px"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-1">Produk Terdaftar</h6>
                        <h3 class="fw-bold">1.250</h3>
                    </div>
                    <i class="mdi mdi-leaf mdi-48px"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-1">Transaksi Hari Ini</h6>
                        <h3 class="fw-bold">Rp 4.800.000</h3>
                    </div>
                    <i class="mdi mdi-cash-multiple mdi-48px"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card bg-warning text-white">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-1">Pengajuan Pinjaman</h6>
                        <h3 class="fw-bold">32</h3>
                    </div>
                    <i class="mdi mdi-bank mdi-48px"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart & Cuaca --}}
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header bg-light">
                    <h6 class="card-title">Harga Pasar Mingguan (Beras)</h6>
                </div>
                <div class="card-body">
                    <div id="hargaPasarChart" style="height: 300px;"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card text-white" style="background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%)">
                <div class="card-body">
                    <h6 class="card-title">Cuaca Hari Ini 🌦️</h6>
                    <p class="mb-2">📍 Brebes, Jawa Tengah</p>
                    <h4 class="mb-2">🌤️ Cerah Berawan - 28°C</h4>
                    <div class="mb-1">💧 Kelembaban: <strong>72%</strong></div>
                    <div class="mb-1">🌬️ Angin: <strong>12 km/h</strong></div>
                    <div class="mb-1">🌡️ Suhu Min/Max: <strong>23°C / 31°C</strong></div>
                    <div class="mt-3">
                        <p class="mb-1">🧪 Indeks UV: <strong>6 (Sedang)</strong></p>
                        <p class="mb-1">🌱 Tips Hari Ini: <em>"Waktu terbaik menyiram tanaman adalah pagi hari sebelum
                                matahari terik."</em></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Aktivitas Terbaru --}}
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header bg-light">
                    <h6 class="card-title mb-0">Aktivitas Terbaru</h6>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">✅ Petani <strong>Pak Budi</strong> menambahkan produk <em>“Cabe Rawit
                                50Kg”</em>.</li>
                        <li class="list-group-item">📝 Pengajuan pinjaman oleh <strong>Ibu Siti</strong> sebesar <strong>Rp
                                3.000.000</strong>.</li>
                        <li class="list-group-item">💬 Diskusi baru: “Cara mengatasi hama wereng” di forum komunitas.</li>
                        <li class="list-group-item">📦 Order baru oleh <strong>Toko Tani Sejahtera</strong> sebanyak 200Kg
                            Jagung.</li>
                        <li class="list-group-item">🔄 Harga Beras naik 3% dibanding kemarin.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        const options = {
            chart: {
                type: 'line',
                height: 300
            },
            series: [{
                name: 'Harga Beras (Rp/Kg)',
                data: [9500, 9700, 9400, 9900, 10100, 10050, 10200]
            }],
            xaxis: {
                categories: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']
            },
            colors: ['#28a745']
        };
        const chart = new ApexCharts(document.querySelector("#hargaPasarChart"), options);
        chart.render();
    </script>
@endpush
