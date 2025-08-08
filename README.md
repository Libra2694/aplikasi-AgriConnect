# 🌾 AgriConnect
![Laravel](https://img.shields.io/badge/Laravel-12-red) ![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)

AgriConnect adalah sebuah aplikasi berbasis web yang dirancang untuk membantu para petani dalam mengelola pertanian mereka secara digital. Dengan tampilan yang user-friendly dan fitur-fitur lengkap, AgriConnect hadir sebagai solusi modern bagi pertanian Indonesia.

## 🖼️ Screenshot Aplikasi

Berikut tampilan utama dari AgriConnect agar kamu bisa dapat gambaran jelas tentang aplikasinya:

| Halaman             | Preview                                               |
|---------------------|------------------------------------------------------|
| Dashboard           | ![Dashboard](https://res.cloudinary.com/dzgxqfnv9/image/upload/v1754664428/imgtourl/Screenshot_2025-08-08_214634_zji7ps.png)          |
| Pasar Hasil Tani       | ![Pasar Hasil Tani](https://res.cloudinary.com/dzgxqfnv9/image/upload/v1754664473/imgtourl/Screenshot_2025-08-08_214733_sovxla.png)  |
| Manajemen Pertanian | ![Manajemen Pertanian](https://res.cloudinary.com/dzgxqfnv9/image/upload/v1754664729/imgtourl/Screenshot_2025-08-08_215154_x5ad4n.png)|
| Layanan Keuangan    | ![Layanan Keuangan](https://res.cloudinary.com/dzgxqfnv9/image/upload/v1754664841/imgtourl/Screenshot_2025-08-08_215244_tgrqyt.png)     |
| Komunitas Petani | ![Komunitas Petani](https://res.cloudinary.com/dzgxqfnv9/image/upload/v1754664874/imgtourl/Screenshot_2025-08-08_215254_j1pgvj.png)|
| Profile    | ![Profile](https://res.cloudinary.com/dzgxqfnv9/image/upload/v1754664919/imgtourl/Screenshot_2025-08-08_215350_oii6x3.png)     |

## 📱 Desain Aplikasi

| Elemen             | Deskripsi                                                                 |
|--------------------|---------------------------------------------------------------------------|
| **Tampilan UI**     | Desain simpel dan mudah digunakan, cocok untuk petani yang belum terbiasa dengan teknologi. |
| **Warna & Layout** | Didominasi warna hijau dan coklat alami yang mencerminkan nuansa pertanian. |
| **Ikon & Gambar**  | Ikon intuitif seperti ikon cuaca, harga, dan pasar agar mudah dimengerti. |

---

## ⚙️ Fitur-Fitur Utama

| Fitur               | Penjelasan                                                                 |
|---------------------|---------------------------------------------------------------------------|
| 🛒 **Pasar Hasil Tani**     | Jual beli produk pertanian langsung melalui platform.                      |
| 📈 **Informasi Harga**   | Update harga pasar secara real-time.                                      |
| 🌦️ **Manajemen Pertanian** | Pantau cuaca, atur jadwal tanam, dan kelola irigasi.                      |
| 💸 **Layanan Keuangan**   | Akses pinjaman, asuransi, dan layanan keuangan lainnya.                  |
| 🧑‍🌾 **Komunitas Petani**   | Forum diskusi untuk berbagi pengalaman dan tips sesama petani.           |

---

## 🔁 Alur Penggunaan Aplikasi

1. **Login/Registrasi**  
   Pengguna mendaftar dengan data pribadi dan informasi pertanian.

2. **Dashboard**  
   Setelah login, pengguna melihat informasi cuaca, harga pasar, dan notifikasi.

3. **Pasar Hasil Tani**  
   Pengguna dapat memposting produk pertanian untuk dijual.

4. **Manajemen Pertanian**  
   Gunakan fitur-fitur manajemen seperti jadwal tanam dan pantauan cuaca.

5. **Layanan Keuangan**  
   Ajukan pinjaman atau layanan asuransi langsung melalui aplikasi.

---

## 🛠️ Teknologi yang Digunakan

| Teknologi  | Keterangan              |
|------------|--------------------------|
| Laravel 12 | Backend Framework        |
| Bootstrap  | Frontend Framework       |
| MySQL      | Database Management      |

---

## 🖼️ Prototype Desain (Figma)

Klik link di bawah untuk melihat prototype desain antarmuka AgriConnect:

👉 [Lihat di Figma](https://www.figma.com/proto/PuldPvl32tCBGZYkBVBmcE/Web-AgriConnect?page-id=0%3A1&node-id=1-2&viewport=141%2C187%2C0.07&t=I6xEMCxrx0FsyIAT-1&scaling=contain&content-scaling=fixed)

---

## 🗃️ Struktur Database

File backup database: `tani_db.sql`  
Sudah disiapkan untuk memudahkan proses setup lokal.

---

## 📑 Laporan Proyek

Laporan lengkap mengenai ide, fitur, alur kerja, dan proses pengembangan tersedia dalam bentuk PDF:  
👉 [Lihat Laporan Proyek (PDF)](docs/laporan-agriconnect.pdf)

---

## 🚀 Instalasi Proyek

> 💡 Catatan: Proyek ini **tidak menggunakan `composer install` maupun `npm install`**.

Langkah-langkah:

1. Clone repositori:
   ```bash
   git clone https://github.com/Libra2694/aplikasi-AgriConnect.git
   ```
2. Buka folder project:
    ```bash
    cd aplikasi-AgriConnect
    ```
3. Pastikan environment .env telah dikonfigurasi.
4. Import database tani_db.sql ke MySQL.
5. Jalankan server lokal (contoh via Laravel Artisan):
    ```bash
    php artisan serve
    ```

## 👤 Developer Team

| Nama    | Lokasi     | GitHub |
|---------|------------|--------|
| Libra   | Indonesia  | [@Libra2694](https://github.com/Libra2694) |
| Ari     | Indonesia  | [@alviandry](https://github.com/alviandry) |
| Hafid   | Indonesia  | [@HafidAkbar](https://github.com/HafidAkbar) |
| Reyhan  | Indonesia  | [@rey20013](https://github.com/rey20013) |

---

## 📄 Lisensi

Proyek ini dirilis di bawah lisensi [MIT License](LICENSE).  
Kamu bebas menggunakan, menyalin, memodifikasi, dan mendistribusikan proyek ini selama menyertakan copyright.

© 2025 - Dibuat oleh Libra and Team.

![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)

---
