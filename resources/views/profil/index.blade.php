@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="mb-4"><i class="bi bi-person-circle me-2"></i>Profil Saya</h3>

    <div class="row">
        <!-- Sidebar Menu Profil -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('profil.index') }}" class="list-group-item list-group-item-action {{ request()->is('profil') ? 'active' : '' }}">
                            <i class="bi bi-info-circle me-2"></i> Informasi Akun
                        </a>
                        <a href="{{ route('profil.topik') }}" class="list-group-item list-group-item-action {{ request()->is('profil/topik') ? 'active' : '' }}">
                            <i class="bi bi-chat-dots me-2"></i> Topik Saya
                        </a>
                        <a href="{{ route('profil.edit') }}" class="list-group-item list-group-item-action {{ request()->is('profil/edit') ? 'active' : '' }}">
                            <i class="bi bi-pencil-square me-2"></i> Edit Profil
                        </a>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="list-group-item list-group-item-action text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Konten Profil Dinamis -->
        <div class="col-md-9">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    @yield('profil-content')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
