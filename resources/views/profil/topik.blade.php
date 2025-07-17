@extends('profil.index')

@section('profil-content')
    <h4>Topik Saya</h4>
    @foreach ($topik as $item)
        <div class="card mb-2">
            <div class="card-body">
                <h5>{{ $item->judul }}</h5>
                <p>{{ Str::limit($item->isi, 100) }}</p>
                <small>{{ $item->created_at->diffForHumans() }}</small>
            </div>
        </div>
    @endforeach
@endsection
