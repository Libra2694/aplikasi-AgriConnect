@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 fw-bold text-primary">
        <i class="bi bi-person-circle me-2"></i> Profil Saya
    </h2>

    <div class="row">
        <!-- Sidebar Menu Profil -->
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card border-0 shadow rounded-4 overflow-hidden">
                <div class="card-body text-center bg-gradient p-4" style="background: linear-gradient(135deg, #e0f7fa, #e3f2fd);">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=0D8ABC&color=fff&size=128" 
                         alt="Avatar" 
                         class="rounded-circle shadow mb-3 transition" 
                         style="width: 90px; transition: transform 0.3s ease;"
                         onmouseover="this.style.transform='scale(1.1)'" 
                         onmouseout="this.style.transform='scale(1)'">
                    <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                    <small class="text-muted d-block mb-2">{{ Auth::user()->email }}</small>
                    <span class="badge bg-primary-subtle text-primary">Akun Aktif</span>
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('profil.index') }}" 
                       class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->is('profil') ? 'active text-primary fw-bold bg-light' : '' }}">
                        <i class="bi bi-info-circle-fill fs-5"></i> Informasi Akun
                    </a>
                    <a href="{{ route('profil.topik') }}" 
                       class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->is('profil/topik') ? 'active text-primary fw-bold bg-light' : '' }}">
                        <i class="bi bi-chat-dots-fill fs-5"></i> Topik Saya
                    </a>
                    <a href="{{ route('profil.edit') }}" 
                       class="list-group-item list-group-item-action d-flex align-items-center gap-2 {{ request()->is('profil/edit') ? 'active text-primary fw-bold bg-light' : '' }}">
                        <i class="bi bi-pencil-square fs-5"></i> Edit Profil
                    </a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="list-group-item list-group-item-action d-flex align-items-center gap-2 text-danger">
                        <i class="bi bi-box-arrow-right fs-5"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <!-- Konten Profil Dinamis -->
        <div class="col-md-8 col-lg-9">
            <div class="card border-0 shadow rounded-4">
                <div class="card-body">
                    @yield('profil-content')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
