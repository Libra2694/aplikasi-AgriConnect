@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Produk Hasil Tani</h4>
                <a href="{{ route('produk.create') }}" class="btn btn-success">+ Tambah Produk</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($produk->count() > 0)
                <div class="row">
                    @foreach ($produk as $item)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card shadow-sm h-100 border-0">
                                @if ($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Produk"
                                        class="img-fluid rounded-top"
                                        style="max-height: 250px; object-fit: contain; width: 100%;">
                                @endif


                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title fw-bold mb-2">{{ $item->nama_produk }}</h5>
                                    <p class="mb-1"><strong>Kategori:</strong> {{ $item->kategori }}</p>
                                    <p class="mb-1"><strong>Harga:</strong> Rp
                                        {{ number_format($item->harga_per_kg, 0, ',', '.') }} <small>/kg</small></p>
                                    <p class="mb-2"><strong>Stok:</strong> {{ $item->stok_kg }} {{ $item->satuan }}</p>

                                    <div class="mb-3">
                                        <span
                                            class="badge w-100 py-2 fs-6
                            @if ($item->status_produk == 'Tersedia') bg-success
                            @elseif ($item->status_produk == 'Habis') bg-danger
                            @else bg-secondary @endif">
                                            {{ $item->status_produk }}
                                        </span>
                                    </div>

                                    <div class="d-flex justify-content-between mt-auto">
                                        <a href="{{ route('produk.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm d-flex align-items-center">
                                            <i class="bi bi-pencil me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('produk.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin menghapus produk ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center">
                                                <i class="bi bi-trash me-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <img src="https://via.placeholder.com/150?text=Belum+Ada+Produk" alt="Empty" class="mb-3">
                    <p class="text-muted">Belum ada produk ditambahkan.</p>
                    <a href="{{ route('produk.create') }}" class="btn btn-primary">+ Tambah Produk Sekarang</a>
                </div>
            @endif
        </div>
    </div>
@endsection
