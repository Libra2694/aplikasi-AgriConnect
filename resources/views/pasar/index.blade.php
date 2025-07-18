@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Pasar Hasil Tani</h1>

    <div class="row">
        <!-- Produk 1 -->
        <div class="col-md-4">
            <div class="card">
                <img src="https://analisadaily.com/imagesfile/202201/20220127-120443_pemkab-aceh-tamiang-akan-bantu-pemasaran-beras-organik.jpeg" class="card-img-top" alt="Beras Organik">
                <div class="card-body">
                    <h5 class="card-title">Beras Organik</h5>
                    <p class="card-text">Rp 12.000 / Kg</p>
                    <a href="#" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- Produk 2 -->
        <div class="col-md-4">
            <div class="card">
                <img src="https://infolubuklinggau.id/wp-content/uploads/2024/08/sayur-kangkung-1-1jpg-20230929073800.jpg" class="card-img-top" alt="Sayur Kangkung">
                <div class="card-body">
                    <h5 class="card-title">Sayur Kangkung</h5>
                    <p class="card-text">Rp 5.000 / Ikat</p>
                    <a href="#" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- Produk 3 -->
        <div class="col-md-4">
            <div class="card">
                <img src="https://berita.gorontaloprov.go.id/wp-content/uploads/2024/01/62bb1bbb60825.jpg" class="card-img-top" alt="Cabai Rawit">
                <div class="card-body">
                    <h5 class="card-title">Cabai Rawit</h5>
                    <p class="card-text">Rp 20.000 / Kg</p>
                    <a href="#" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
