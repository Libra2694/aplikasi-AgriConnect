<?php
use Illuminate\Support\Facades\Http;

public function index()
{
    $kodeAdm4 = '1671010005'; // Ganti dengan kode wilayah Plaju (jika sudah tau pasti)
    $response = Http::get("https://api.bmkg.go.id/publik/prakiraan-cuaca", [
        'adm4' => $kodeAdm4
    ]);

    $cuaca = null;
    if ($response->successful()) {
        $data = $response->json();

        $cuaca = [
            'lokasi' => 'Plaju, Palembang',
            'kondisi' => $data['weather_desc'] ?? '-',
            'suhu' => $data['t'] ?? '-',
            'kelembaban' => $data['hu'] ?? '-',
            'angin' => $data['ws'] ?? '-',
            'min_max' => [
                'min' => $data['t_min'] ?? '-',
                'max' => $data['t_max'] ?? '-'
            ],
            'uv' => $data['uv'] ?? '-',
        ];
    }

    return view('dashboard', compact('cuaca'));
}
