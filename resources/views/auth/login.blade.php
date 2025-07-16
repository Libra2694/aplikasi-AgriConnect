@extends('layouts.login')

@section('title', 'Login | Agriconnect')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body px-4 py-5">
                    <div class="text-center mb-4">
                        <img src="{{ asset('assets/images/logo.svg') }}" alt="Logo" class="mx-auto d-block mb-4"
                            style="max-height: 100px;">
                        <h4 class="mt-3">Selamat Datang 👋</h4>
                        <p class="text-muted">Masuk ke akun Agriconnect Anda</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" name="email" class="form-control form-control-lg" id="email"
                                placeholder="email" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" name="password" class="form-control form-control-lg" id="password"
                                placeholder="password" required>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember">
                                <label class="form-check-label" for="remember">Ingat saya</label>
                            </div>
                            <a href="#" class="text-decoration-none text-primary small">Lupa Password?</a>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 btn-lg">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
