@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-4 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                <h4>Data Diri</h4>
                <span>Nama : <b>{{ auth('pelanggan')->user()->nama }}</b></span><br>
                <span>Alamat : <b>{{ auth('pelanggan')->user()->alamat }}</b></span><br>
                <span>Email : <b>{{ auth('pelanggan')->user()->email }}</b></span><br>
                <hr>
                <span>Terima Kasih Telah Registrasi</span>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body col-lg-10">
                <h4>Produk yang Dibeli</h4>
                <ul>
                    @foreach($order->orderItems as $item)
                        <li>{{ $item->obat->nama_obat }} x {{ $item->jumlah_order_item }}</li>
                    @endforeach
                </ul>
                <form action="{{ route('pembayaran.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_order" value="{{ $order->id_order }}">
                    <div class="mb-3">
                        <label for="total_bayar" class="form-label">Total Bayar</label>
                        <input type="text" name="total_bayar" value="Rp. {{ number_format($order->total_order, 0, ',', '.') }}" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="No Rekening" class="form-label">Bank Tujuan: BCA a/n Wandi - 0583493xxx</label>
                    </div>
                    <div class="mb-3">
                        <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="bukti_pembayaran" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
