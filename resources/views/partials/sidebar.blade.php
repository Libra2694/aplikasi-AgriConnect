<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
        <a class="sidebar-brand brand-logo" href="#">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" />
        </a>
        <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="#">
            <img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" />
        </a>
    </div>

    <ul class="nav">
        <!-- Profil -->
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('assets/images/faces/profil.png') }}" alt="profile" />
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column pr-3">
                    <span class="font-weight-medium mb-2">Admin</span>
                    <span class="font-weight-normal">Admin</span>
                </div>
            </a>
        </li>

        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <!-- Pasar Hasil Tani -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('produk.index') }}">
                <i class="mdi mdi-store menu-icon"></i>
                <span class="menu-title">Pasar Hasil Tani</span>
            </a>
        </li>


        <!-- Info Harga Pasar -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('harga-pasar.index') }}">
                <i class="mdi mdi-chart-line menu-icon"></i>
                <span class="menu-title">Info Harga Pasar</span>
            </a>
        </li>


        <!-- Manajemen Pertanian -->
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#manajemenMenu" role="button" aria-expanded="false"
                aria-controls="manajemenMenu">
                <i class="mdi mdi-calendar-range menu-icon"></i>
                <span class="menu-title">Manajemen Pertanian</span>
                <i class="menu-arrow"></i>
            </a>

            <div class="collapse" id="manajemenMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('manajemen.index') }}">Ringkasan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tanaman.index') }}">Jadwal Tanam&Panen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kegiatan.index') }}">Catatan Harian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('penggunaan-obat.index') }}">Penggunaan Obat</a>
                    </li>
                </ul>
            </div>
        </li>




        <!-- Layanan Keuangan -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#keuangan" role="button"
                aria-expanded="false" aria-controls="keuangan">
                <i class="mdi mdi-cash-multiple menu-icon"></i>
                <span class="menu-title">Layanan Keuangan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="keuangan">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('transaksi-keuangan.index') }}">Transaksi Keuangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pinjaman-modal.index') }}">Pinjaman Modal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('asuransi.index') }}">Asuransi Pertanian</a>
                    </li>
                </ul>
            </div>
        </li>


        <!-- Komunitas -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('informasi.index') }}">
                <i class="mdi mdi-forum menu-icon"></i>
                <span class="menu-title">Komunitas Petani</span>
            </a>
        </li>

        <!-- Profil -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profil.index') }}">
                <i class="mdi mdi-account-circle menu-icon"></i>
                <span class="menu-title">Profil Saya</span>
            </a>
        </li>


        <!-- Logout -->
        <li class="nav-item sidebar-actions">
            <div class="nav-link">
                <div class="mt-4">
                    <p class="text-black font-weight-bold">Akun</p>
                    <ul class="mt-2 pl-0">
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit"
                                    class="btn btn-link d-flex align-items-center text-primary p-0 m-0">
                                    <i class="mdi mdi-logout mr-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</nav>
