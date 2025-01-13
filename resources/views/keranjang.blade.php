@extends('layouts.main')

@section('container')
    <div class="container mt-5">
        <h2 class="mb-4">Keranjang</h2>

        @if ($keranjangItems->count() > 0)
            <div class="row">
                <div class="col-md-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Obat</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Total</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keranjangItems as $key => $item)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>
                                        <img src="{{ $item->obat->gambar_obat }}" alt="{{ $item->obat->nama_obat }}"
                                            class="img-thumbnail" style="max-width: 100px;">
                                        {{ $item->obat->nama_obat }}
                                    </td>
                                    <td>{{ $item->jumlah_keranjang }}</td>
                                    <td>Rp. {{ number_format($item->harga_keranjang, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($item->total_keranjang, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('keranjang.hapus', $item->id_keranjang) }}" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')">
                                            <span data-feather="x-circle"></span>Hapus
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Keranjang Belanja</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Total:
                                    <span>Rp. {{ number_format($totalKeranjang, 0, ',', '.') }}</span>
                                </li>
                            </ul>
                            <a href="{{ route('checkout') }}" class="btn btn-primary mt-3">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('obat') }}" class="btn btn-success">Lanjut Belanja</a>
        @else
            <p>Tidak ada produk dalam keranjang belanja.</p>
            <a href="{{ route('obat') }}" class="btn btn-success">Mulai Belanja</a>
        @endif
    </div>
@endsection
