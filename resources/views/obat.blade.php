@extends('layouts.main')

@section('container')
<section class="container mt-5">
    <h2 class="mb-4">Daftar Obat-obatan</h2>
    <div class="row">
        @foreach($obat as $item)
            <div class="col-md-12 col-lg-3">
                <div class="card mb-4">
                    <img style="height: 200px; object-fit: cover;" src="{{ $item->gambar_obat }}" class="card-img-top" alt="{{ $item->nama_obat }}">
                    <div class="card-body">
                        <h3 class="card-title">{{ $item->nama_obat }}</h3>
                        <h5>{{ "Rp " . number_format($item->harga_obat, 0, ',', '.') }}</h5>
                        <a class="btn btn-success" href="{{ route('obat.detail', $item->id_obat) }}">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination links -->
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            {{ $obat->links('pagination::bootstrap-4') }}
        </ul>
    </nav>
</section>
@endsection
