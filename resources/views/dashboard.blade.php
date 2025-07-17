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
        @php
            $cards = [
                ['color' => 'success', 'title' => 'Petani Terdaftar', 'value' => '342', 'icon' => 'mdi-account'],
                ['color' => 'primary', 'title' => 'Produk Terdaftar', 'value' => '1.250', 'icon' => 'mdi-leaf'],
                ['color' => 'info', 'title' => 'Transaksi Hari Ini', 'value' => 'Rp 4.800.000', 'icon' => 'mdi-cash-multiple'],
                ['color' => 'warning', 'title' => 'Pengajuan Pinjaman', 'value' => '32', 'icon' => 'mdi-bank'],
            ];
        @endphp

        @foreach ($cards as $card)
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card bg-{{ $card['color'] }} text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1">{{ $card['title'] }}</h6>
                            <h3 class="fw-bold">{{ $card['value'] }}</h3>
                        </div>
                        <i class="mdi {{ $card['icon'] }} mdi-48px"></i>
                    </div>
                </div>
            </div>
        @endforeach
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
                <div class="card-body" id="weather-card" style="color: white;">
                    <h4 id="lokasi">📍 Loading...</h4>
                    <p id="cuaca">🌤️ -</p>
                    <p id="suhu">🌡️ -</p>
                    <p id="kelembaban">💧 -</p>
                    <p id="angin">🌬️ -</p>
                    <p id="minmax">🌡️ Min/Max: -</p>
                    <p id="uv">🧪 -</p>
                    <p id="tips">🌱 Tips: Waktu terbaik menyiram tanaman adalah pagi hari sebelum matahari terik.</p>
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
                        <li class="list-group-item">✅ Petani <strong>Pak Budi</strong> menambahkan produk <em>“Cabe Rawit 50Kg”</em>.</li>
                        <li class="list-group-item">📝 Pengajuan pinjaman oleh <strong>Ibu Siti</strong> sebesar <strong>Rp 3.000.000</strong>.</li>
                        <li class="list-group-item">💬 Diskusi baru: “Cara mengatasi hama wereng” di forum komunitas.</li>
                        <li class="list-group-item">📦 Order baru oleh <strong>Toko Tani Sejahtera</strong> sebanyak 200Kg Jagung.</li>
                        <li class="list-group-item">🔄 Harga Beras naik 3% dibanding kemarin.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- ApexChart --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        const chartOptions = {
            chart: { type: 'line', height: 300 },
            series: [{
                name: 'Harga Beras (Rp/Kg)',
                data: [9500, 9700, 9400, 9900, 10100, 10050, 10200]
            }],
            xaxis: {
                categories: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']
            },
            colors: ['#28a745']
        };

        const chart = new ApexCharts(document.querySelector("#hargaPasarChart"), chartOptions);
        chart.render();
    </script>

    {{-- WeatherAPI Fetch --}}
    {{-- Enc by LibraXploit --}}
    <script>
<!-- 
document.write(unescape("%3Cscript%3E%0A%20%20%20%20%20%20%20%20const%20API_KEY%20%3D%20%22d0b4c59abc3942d9bd6134259251707%22%3B%0A%20%20%20%20%20%20%20%20const%20lokasi%20%3D%20%22Palembang%22%3B%0A%0A%20%20%20%20%20%20%20%20fetch%28%60https%3A//api.weatherapi.com/v1/forecast.json%3Fkey%3D%24%7BAPI_KEY%7D%26q%3D%24%7Blokasi%7D%26days%3D1%26aqi%3Dno%26alerts%3Dno%60%29%0A%20%20%20%20%20%20%20%20%20%20%20%20.then%28res%20%3D%3E%20res.json%28%29%29%0A%20%20%20%20%20%20%20%20%20%20%20%20.then%28data%20%3D%3E%20%7B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20const%20cuaca%20%3D%20data.current.condition.text%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20const%20suhu%20%3D%20data.current.temp_c%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20const%20kelembaban%20%3D%20data.current.humidity%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20const%20angin%20%3D%20data.current.wind_kph%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20const%20uv%20%3D%20data.current.uv%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20const%20min%20%3D%20data.forecast.forecastday%5B0%5D.day.mintemp_c%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20const%20max%20%3D%20data.forecast.forecastday%5B0%5D.day.maxtemp_c%3B%0A%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20document.getElementById%28%22lokasi%22%29.innerText%20%3D%20%60%uD83D%uDCCD%20%24%7Bdata.location.name%7D%2C%20%24%7Bdata.location.region%7D%60%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20document.getElementById%28%22cuaca%22%29.innerText%20%3D%20%60%uD83C%uDF24%uFE0F%20%24%7Bcuaca%7D%60%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20document.getElementById%28%22suhu%22%29.innerText%20%3D%20%60%uD83C%uDF21%uFE0F%20%24%7Bsuhu%7D%B0C%60%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20document.getElementById%28%22kelembaban%22%29.innerText%20%3D%20%60%uD83D%uDCA7%20Kelembaban%3A%20%24%7Bkelembaban%7D%25%60%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20document.getElementById%28%22angin%22%29.innerText%20%3D%20%60%uD83C%uDF2C%uFE0F%20Angin%3A%20%24%7Bangin%7D%20km/h%60%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20document.getElementById%28%22minmax%22%29.innerText%20%3D%20%60%uD83C%uDF21%uFE0F%20Suhu%20Min/Max%3A%20%24%7Bmin%7D%B0C%20/%20%24%7Bmax%7D%B0C%60%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20document.getElementById%28%22uv%22%29.innerText%20%3D%20%60%uD83E%uDDEA%20Indeks%20UV%3A%20%24%7Buv%7D%60%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%7D%29%0A%20%20%20%20%20%20%20%20%20%20%20%20.catch%28error%20%3D%3E%20%7B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20console.error%28%22Gagal%20mengambil%20data%20cuaca%3A%22%2C%20error%29%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20document.getElementById%28%22lokasi%22%29.innerText%20%3D%20%22%u274C%20Gagal%20Memuat%20Data%20Cuaca%22%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%7D%29%3B%0A%20%20%20%20%3C/script%3E"));
//-->
</script>
@endpush
