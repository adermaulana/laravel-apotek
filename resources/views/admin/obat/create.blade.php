@extends('admin.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="col-lg-12">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Tambah Obat Baru</h1>
            </div>

            <div class="col-lg-8">
                {{-- Form Tambah Obat --}}
                <form method="POST" action="{{ route('obat.store') }}" enctype="multipart/form-data" class="mb-5">
                    @csrf {{-- Token CSRF untuk keamanan --}}

                    {{-- Input Nama Obat --}}
                    <div class="mb-3">
                        <label for="nama_obat" class="form-label">Nama Obat</label>
                        <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat"
                            name="nama_obat" value="{{ old('nama_obat') }}" required autofocus>
                        @error('nama_obat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input Deskripsi --}}
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                            name="deskripsi" value="{{ old('deskripsi') }}">
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input Harga --}}
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                            name="harga" value="{{ old('harga') }}">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input Gambar --}}
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                            name="gambar">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol Submit --}}
                    <button type="submit" class="btn btn-success">Tambah Data</button>
                </form>
            </div>
        </div>
    </main>
@endsection
