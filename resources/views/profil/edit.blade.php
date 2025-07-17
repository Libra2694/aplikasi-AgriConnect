@extends('profil.index')

@section('profil-content')
    <h4>Edit Profil</h4>

    <form method="POST" action="{{ route('profil.update') }}">
        @csrf

        <div class="mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
