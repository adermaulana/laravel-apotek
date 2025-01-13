@extends('layouts.main')

@section('container')
    <section class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-4">
                    <img src="/{{ $obat->gambar_obat }}" class="card-img-top" alt="{{ $obat->nama_obat }}">
                </div>
            </div>
            <div class="col-md-7">
                <div class="mb-4 mt-5">
                    <div class="card-body ms-5">
                        <h1 class="card-title">{{ $obat->nama_obat }}</h1>
                        <p class="card-text mt-2">{{ $obat->deskripsi_obat }}</p>
                        <p class="text-muted">Stok {{ $obat->stok_obat }}</p>
                        <h3 class="mb-3">Rp {{ number_format($obat->harga_obat, 0, ',', '.') }}</h3>
                        <form action="{{ route('obat.addToCart') }}" method="post" onsubmit="return checkLoginStatus()">
                            @csrf
                            <input type="hidden" name="id_obat" value="{{ $obat->id_obat }}">
                            <input type="hidden" id="harga" name="harga" value="{{ $obat->harga_obat }}">
                            <div class="mb-3 col-3">
                                <input type="number" class="form-control" id="jumlah" name="jumlah"
                                    oninput="validasiInput(this)" required autofocus>
                            </div>
                            <button type="submit" class="btn btn-success" name="simpan">Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function checkLoginStatus() {
            var isAdmin = @json(Auth::check());
            var isPelanggan = @json(Auth::guard('pelanggan')->check());

            if (!isAdmin && !isPelanggan) {
                alert('Anda harus login untuk melakukan pembelian.');
                return false;
            }

            if (isAdmin) {
                alert('Anda adalah admin, tidak bisa melakukan pembelian.');
                return false; // Mencegah form submission jika admin
            }

            if (isPelanggan) {
                return true; // Mengizinkan form submission jika pelanggan
            }
        }

        function validasiInput(input) {
            input.value = input.value.replace(/[^0-9]/g, '');
            if (input.value === '' || input.value === '0') {
                input.setCustomValidity('Masukkan angka yang valid dan bukan 0.');
            } else {
                input.setCustomValidity('');
            }
        }
    </script>
@endsection
