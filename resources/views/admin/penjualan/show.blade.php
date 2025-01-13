@extends('admin.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="col-lg-12">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Detail Penjualan</h1>
        </div>
        <a href="{{ route('penjualan.index') }}" class="btn btn-success mb-3">Kembali</a>
        <div class="card mb-3 col-md-6">
            <div class="card-body">
                <div>
                    <h6>Data Diri Pelanggan:</h6>
                    <p>Nama: {{ $order->nama_order }}</p>
                    <p>Alamat: {{ $order->alamat_order }}</p>
                    <p>Email: {{ $order->email_order }}</p>
                    <p>Telepon: {{ $order->telepon_order }}</p>
                </div>
                <h5 class="card-title">Order ID: {{ $order->id_order }}</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Obat</th>
                            <th>Gambar</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $totalHarga = 0; @endphp
                        @foreach ($order->orderItems as $item)
                            @php
                                $totalHargaProduk = $item->obat->harga_obat * $item->jumlah_order_item;
                                $totalHarga += $totalHargaProduk;
                            @endphp
                            <tr>
                                <td>{{ $item->obat->nama_obat }}</td>
                                <td><a target="_blank" href="/{{ $item->obat->gambar_obat }}"><img class="img-fluid" width="50" src="/{{ $item->obat->gambar_obat }}" alt=""></a></td>
                                <td>{{ $item->jumlah_order_item }}</td>
                                <td>Rp {{ number_format($totalHargaProduk, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    <h5>Grand Total: Rp {{ number_format($totalHarga, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
