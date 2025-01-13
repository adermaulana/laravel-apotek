@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <h2 class="mb-4">Checkout</h2>
    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail</h5>
                        <input type="hidden" name="pelanggan_id" value="{{ $user->id }}">
                        <div class="mb-3 col-md-8">
                            <label class="form-label">Nama<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama" value="{{ $user->nama_pelanggan }}" required>
                        </div>
                        <div class="mb-3 col-md-8">
                            <label class="form-label">Alamat<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="alamat" value="{{ $user->alamat_pelanggan }}" required>
                        </div>
                        <div class="mb-3 col-md-8">
                            <label class="form-label">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email_pelanggan }}" required>
                        </div>
                        <div class="mb-3 col-md-8">
                            <label class="form-label">Telepon<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="telepon" value="{{ $user->telepon_pelanggan }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pesanan</h5>
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($keranjangItems as $item)
                                <tr>
                                    <td>{{ $item->obat->nama_obat }} x {{ $item->jumlah_keranjang }}</td>
                                    <td>Rp. {{ number_format($item->total_keranjang, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total Harga</th>
                                    <td>Rp. {{ number_format($totalKeranjang, 0, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <input type="hidden" name="total_order" value="{{ $totalKeranjang }}">
                <button type="submit" class="btn btn-primary mt-3">Order</button>
            </div>
        </div>
    </form>
</div>
@endsection