@extends('layouts.main')

@section('container')
    <section class="jumbotron text-center mt-5">
        <div class="container">
            <h1>Selamat Datang di Apotek Kami</h1>
            <p>Temukan obat-obatan berkualitas dan pelayanan terbaik di sini.</p>
            <a href="{{ route('obat') }}" class="btn btn-success btn-lg">Lihat Obat-obatan</a>
        </div>
    </section>

    <section class="container mt-5">
        <h2 class="text-center mb-4">Daftar Obat Terbaru</h2>
        <div class="row">
            @foreach ($obatTerbaru as $obat)
                <div class="col-lg-4 mb-3">
                    <div class="card mb-4" style="height: 100%;">
                        <img style="height: 250px; object-fit: cover;" src="{{ $obat->gambar_obat }}"
                            class="card-img-top" alt="{{ $obat->nama_obat }}">

                        <div class="card-body">
                            <h5 class="card-title">{{ $obat->nama_obat }}</h5>
                            <p class="card-text">{{ $obat->deskripsi_obat }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
